# Module 11 — Daily cash register

## Objective and scope

Open/close cash sessions; record cash movements tied to cash sales, expenses, pay-in/out.

## Existing code to reuse

Payments (cash method); expenses (later); auth user as cashier.

## Dependencies

Modules 08–10 recommended; expenses integration in 12.

## Mobile-first screen requirements

Open session (float); live expected cash summary; close with counted cash + variance; movement list.

## Database changes

`cash_sessions`, `cash_movements`.

## Routes and authorization

`cash_session.*`; one open session per register/user policy (confirm).

## Business rules and validation

- Cannot close twice; movements require open session
- Variance stored; no silent rewrite of closed sessions

## Files likely created or modified

Migrations, models, services, controllers, views, tests.

## Error and empty states

Already open session; close without count validation.

## Automated test cases

Open/close; cash sale creates movement when integrated; double-open blocked.

## Acceptance criteria

- [ ] Session lifecycle works
- [ ] Auditable movements
- [ ] Tests run

## Documentation updates required

Schema, progress; policy for multi-cashier.

## Status

Not started.
