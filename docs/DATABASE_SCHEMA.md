# Database schema

**Status:** Proposed design for shop modules + inventory of **existing** tables.  
This document is **not** permission to create every table at once. Implement tables only inside the module that needs them. Reuse existing tables when they fit.

## Locked business decisions (2026-10-23)

| Topic | Decision |
|-------|----------|
| Shop customers | **Separate `customers` table** (not `users` + Customer role). Existing users-based Customer CRUD will be replaced in module 07. |
| Product types | **Enum/string column** on `products` — no `product_types` table. |
| Negative stock | **Not allowed** — block oversell / negative quantity. |
| Tax / GST | **Bill-level only** for now — enough on the sale; **not** product-wise / per-line tax rates. |
| Currency | **INR**, money as `DECIMAL(14,2)` (two decimal places). Display as Indian Rupees. |
| PHP | Runtime aligned to **8.3+** (matches Composer `^8.3`). |

Quantities (stock/sale lines): keep `DECIMAL(14,3)` unless a later module decides otherwise.

## Existing tables (boilerplate)

### `users`

| Column | Notes |
|--------|--------|
| id | PK |
| name, email (unique), password | Auth |
| email_verified_at | Nullable |
| mobile, dob, gender, image | Profile |
| status | Tinyint / boolean cast |
| remember_token, timestamps, softDeletes | |

Used for **admin/staff auth only** going forward. Current users-based “Customers” CRUD (role `Customer`) is transitional and will be replaced by the dedicated `customers` table in module 07.

### Spatie permission

`permissions` (includes `group_name`), `roles`, `model_has_permissions`, `model_has_roles`, `role_has_permissions`.

### Framework

`password_reset_tokens`, `sessions`, `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`.

---

## Proposed shop entities

Types below are suggestions; adjust per module after confirmation.

### Catalogue

#### `categories`

- id, name, slug (unique), parent_id (nullable FK → categories), sort_order, is_active, timestamps, softDeletes?

#### `units`

- id, name, symbol/short_code (unique), timestamps

#### `products`

- id, category_id (FK), **type** (string/enum column — e.g. simple/service/…; values finalized in module 04), name, slug/sku base, description, track_stock (bool), is_active, timestamps, softDeletes  
- **No** `product_types` table.

#### `product_variants`

- id, product_id (FK), sku (unique), barcode (nullable unique), name/label, unit_id (FK), cost_price **DECIMAL(14,2)**, sell_price **DECIMAL(14,2)** (INR), reorder_level DECIMAL(14,3), is_active, timestamps, softDeletes

#### `stocks` (current quantity projection) — optional

- variant_id (PK/FK), quantity DECIMAL(14,3), updated_at  
- Or store quantity only derived from movements (heavier); prefer cached qty + movement audit.

#### `stock_movements`

- id, variant_id (FK), type (in/out/adjust/sale/purchase/return…), quantity DECIMAL(14,3) signed or direction+qty, unit_cost nullable, reference_type/id morph, notes, user_id, created_at  
- Append-only; do not silently rewrite history.

### Customers (shop) — **decided: dedicated table**

#### `customers`

- id, name, mobile (unique nullable), email nullable, address, credit_limit DECIMAL(14,2), is_active, timestamps, softDeletes  
- Opening balance via ledger entry only — not a freely editable balance as source of truth.  
- No login password; distinct from `users` (staff).

### Sales / billing

#### `sales`

- id, invoice_no (unique), customer_id nullable (FK → `customers`), user_id (cashier → `users`), status (draft/finalized/void), subtotal, discount, **tax (bill-level GST)**, total — all money **DECIMAL(14,2)** INR, paid_total, balance_due, sold_at, client_uuid (unique, for future offline idempotency), timestamps  
- Tax/GST is applied at **sale/bill level only** (not product-wise rates for now).

#### `sale_items`

- id, sale_id (FK), variant_id nullable (keep snapshot even if variant deleted), product_name, variant_name, sku, unit_label, quantity DECIMAL(14,3), unit_price DECIMAL(14,2), discount DECIMAL(14,2), line_total DECIMAL(14,2) — **historical snapshot fields required**  
- No per-product tax columns required for v1 (bill-level tax on `sales`).

### Payments and ledger

#### `payments`

- id, customer_id nullable, sale_id nullable, method (cash/upi/card/credit/…), amount DECIMAL(14,2), received_at, user_id, reference, notes, client_uuid unique nullable, timestamps

#### `payment_allocations` (if one payment covers many invoices)

- id, payment_id, sale_id, amount DECIMAL(14,2)

#### `customer_ledger_entries`

- id, customer_id, entry_type (sale_debit/payment_credit/adjustment…), amount DECIMAL(14,2), balance_after optional, reference morph, notes, user_id, created_at  
- **Source of truth** for balances; UI must not edit “balance” directly.

### Cash register

#### `cash_sessions`

- id, opened_by, closed_by nullable, opened_at, closed_at nullable, opening_float DECIMAL(14,2), closing_count DECIMAL(14,2) nullable, expected_cash nullable, variance nullable, status open/closed, notes

#### `cash_movements`

- id, cash_session_id, type (sale_cash_in/expense_out/pay_in/pay_out/adjust), amount DECIMAL(14,2), reference morph, user_id, created_at, notes

### Expenses

#### `expense_categories`

- id, name, is_active, timestamps

#### `expenses`

- id, expense_category_id, amount DECIMAL(14,2), spent_at, payment_method, cash_session_id nullable, notes, user_id, attachment nullable, timestamps  
- Distinct from inventory purchase/stock-in flows.

---

## Relationship overview

```
categories ─┬─< products ──< product_variants >── units
            │                      │
            │                      ├─< stock_movements
            │                      └─< sale_items >── sales >── customers
            │                                              │
            │                                              ├─< payments
            │                                              └─< customer_ledger_entries
cash_sessions ──< cash_movements
expense_categories ──< expenses
```

## Money and stock rules (schema implications)

- Currency: **INR**; all money columns: `DECIMAL(14,2)`, never float.
- Quantities: `DECIMAL(14,3)` unless changed later.
- **Negative stock forbidden** — enforce in services before committing movements/sales.
- Unique: SKU, invoice_no, client_uuid (when used).
- Foreign keys with appropriate `restrict`/`cascade` (prefer restrict on historical sale FKs).

## Changelog

| Date | Change |
|------|--------|
| 2026-10-23 | Initial inventory + proposed shop schema (no shop migrations created yet) |
| 2026-10-23 | Locked: separate customers, product type enum, no negative stock, bill-level GST, INR 2dp |
