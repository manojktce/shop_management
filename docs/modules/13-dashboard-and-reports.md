# Module 13 — Dashboard statistics and reports

## Objective and scope

Replace placeholder dashboard with real stats and basic reports (sales, stock, receivables, cash) using existing Bootstrap cards—not a new analytics SPA.

## Existing code to reuse

`DashboardController`, `backend/dashboard/index.blade.php`, query aggregates from prior modules.

## Dependencies

Meaningful after modules 06–12 have data; can stub earlier with empty states.

## Mobile-first screen requirements

Stacked KPI cards; date filters; charts only if lightweight and readable on 360px (optional).

## Database changes

None expected (read models/queries); indexes may be added if slow.

## Routes and authorization

Dashboard auth; report routes with permissions e.g. `report.sales`.

## Business rules and validation

- Numbers from DB aggregates; money as DECIMAL formatting
- Respect permissions (e.g. hide cost if unauthorized)—confirm

## Files likely created or modified

Dashboard controller/views; report controllers; optional query classes.

## Error and empty states

Zero-data empty charts/lists.

## Automated test cases

Authorized access; aggregate smoke with factories.

## Acceptance criteria

- [ ] KPIs match sample data
- [ ] Mobile stacked layout
- [ ] Tests for access + basic totals

## Documentation updates required

Progress; list of available reports.

## Status

Not started.
