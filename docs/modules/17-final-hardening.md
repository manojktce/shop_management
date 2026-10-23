# Module 17 — Final security, regression, and deployment checks

## Objective and scope

Security review, full regression, deployment checklist. No new features unless fixing blockers.

## Existing code to reuse

Entire app; Pest suite; Pint.

## Dependencies

Modules intended for go-live (typically through 13; PWA optional).

## Mobile-first screen requirements

Spot-check critical flows at 360px (login, POS, pay, stock).

## Database changes

Only if indexes/constraints found missing; no reckless `migrate:fresh` on shared/prod data.

## Routes and authorization

Audit all admin routes for `auth` + permissions; remove debug routes.

## Business rules and validation

Re-verify money/stock/ledger invariants; CSRF; mass-assignment; file uploads.

## Files likely created or modified

Tests, minor fixes, deployment doc section in `PROJECT_GUIDE.md` or `docs/DEPLOYMENT.md` if added.

## Error and empty states

Verify production error pages don’t leak secrets.

## Automated test cases

Full `php artisan test`; fix failures.

## Acceptance criteria

- [ ] Test suite green locally
- [ ] Permission audit done
- [ ] Deployment steps documented without secrets
- [ ] No unresolved critical acceptance items from earlier modules

## Documentation updates required

Progress marked complete; known limitations listed.

## Status

Not started.
