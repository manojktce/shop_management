# Module 12 — Expenses

## Objective and scope

Operating expenses with categories. **Distinct from inventory purchases/stock-in.**

## Existing code to reuse

CRUD pattern; optional link to `cash_sessions` for cash expenses.

## Dependencies

Module 11 if cash-linked; otherwise can follow 10.

## Mobile-first screen requirements

Quick expense entry; category select; list/filter by date.

## Database changes

`expense_categories`, `expenses` (DECIMAL amount).

## Routes and authorization

`expense.*`, `expense_category.*` (or manage categories under settings).

## Business rules and validation

- Positive amount; required category/date
- Do not use expenses to adjust stock

## Files likely created or modified

Migrations, models, controllers, views, seeders, sidebar, tests.

## Error and empty states

No categories; validation errors.

## Automated test cases

CRUD; cash movement created when paid from register (if integrated).

## Acceptance criteria

- [ ] Expenses CRUD separate from purchases
- [ ] Tests run; mobile OK

## Documentation updates required

Schema, progress.

## Status

Not started.
