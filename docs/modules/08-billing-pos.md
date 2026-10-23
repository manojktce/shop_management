# Module 08 — Billing and point of sale

## Objective and scope

Create and finalize sales (POS): select customer (optional), add variants, quantities, discounts, totals; finalize with stock + snapshot lines in one transaction.

## Existing code to reuse

Variants/stock services; customer module; Bootstrap layout; Vue only if cart UX needs it (`resources/js/backend`).

## Dependencies

Modules 05–07 (stock strongly recommended before finalize).

## Mobile-first screen requirements

- 360px POS: search products, cart lines, **sticky totals + primary Pay/Finalize**
- Touch-friendly qty steppers; minimal typing
- Loading/error states on finalize

## Database changes

`sales`, `sale_items` with snapshot columns; optional `client_uuid` for future offline.  
Money INR `DECIMAL(14,2)`. Tax/GST on **`sales` bill level only** (not product-wise line tax rates).

## Routes and authorization

`sales` / `pos` routes; `sale.*` permissions; cashiers need create/finalize.

## Business rules and validation

- Atomic finalize: sale + items + stock movements (+ later payment/ledger)
- Negative stock not allowed
- Snapshot names/prices/discounts on lines (no per-product tax required in v1)
- Bill-level GST/tax field on the sale
- Draft vs finalized; no silent edit of finalized sales

## Files likely created or modified

Migrations, models, `BillingService` / `SaleService`, controllers, Blade/Vue POS UI, permissions, tests.

## Error and empty states

Empty cart; stock failure; customer required if credit sale.

## Automated test cases

Finalize success; stock decrement; insufficient stock rolls back; permission checks.

## Acceptance criteria

- [ ] Finalize atomic and correct
- [ ] Mobile POS usable at 360px
- [ ] Tests run

## Documentation updates required

Schema, progress.

## Status

Not started.
