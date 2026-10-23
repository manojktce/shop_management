# Module 06 — Stock management and stock movements

## Objective and scope

Maintain stock quantity per variant via auditable `stock_movements` (and optional `stocks` projection). Support stock-in, adjust, and hooks for later sale outflows.

## Existing code to reuse

Variants; Crud patterns; `DB::transaction` for multi-row updates.

## Dependencies

Module 05.

## Mobile-first screen requirements

Stock list by variant; movement form (type, qty, notes); movement history; low-stock indicator.

## Database changes

`stock_movements`; optional `stocks` table. Indexes on variant_id, created_at.

## Routes and authorization

`stock` / `stock-movements` permissions; no arbitrary rewrite of past movements.

## Business rules and validation

- Append-only movements; adjust via new movement rows
- **Negative stock not allowed** (locked business rule)
- Sale-related outflows deferred to billing module but service API should be ready

## Files likely created or modified

Migrations, models, `StockService`, controllers, views, tests.

## Error and empty states

Insufficient stock error; empty movement history.

## Automated test cases

Stock-in increases qty; oversell blocked; concurrent-safe transaction behavior as practical.

## Acceptance criteria

- [ ] Movements auditable; qty correct; negative blocked
- [ ] Tests run

## Documentation updates required

Schema, progress.

## Status

Not started.
