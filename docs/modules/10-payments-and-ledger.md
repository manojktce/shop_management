# Module 10 — Payments and customer credit ledger

## Objective and scope

Record payments (cash/UPI/card/credit), allocate to sales if needed, append `customer_ledger_entries`. Balances are derived.

## Existing code to reuse

Sales, customers; transactional services pattern from billing.

## Dependencies

Modules 07–08.

## Mobile-first screen requirements

Collect payment UI (from POS and customer profile); show balance (read-only); payment history.

## Database changes

`payments`, optional `payment_allocations`, `customer_ledger_entries`.

## Routes and authorization

`payment.*` permissions; never expose raw balance edit endpoint.

## Business rules and validation

- Ledger append-only; adjustments are explicit typed entries
- Atomic with sale finalize when paying at billing time
- Amounts DECIMAL; no float

## Files likely created or modified

Migrations, models, `PaymentService` / `LedgerService`, controllers, views, tests.

## Error and empty states

Over-allocation rejected; zero balance empty state.

## Automated test cases

Payment posts ledger; balance correct; cannot PATCH balance directly; allocation sums.

## Acceptance criteria

- [ ] Payments + ledger consistent with sales
- [ ] No direct balance edits
- [ ] Tests run

## Documentation updates required

Schema, progress.

## Status

Not started.
