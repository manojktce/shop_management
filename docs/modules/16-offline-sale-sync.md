# Module 16 — Offline sale synchronization

## Objective and scope

Push pending sales with client UUIDs; idempotent server apply; validate stock/rules; flag conflicts. Only when requested.

## Existing code to reuse

Billing services; `client_uuid` unique; PWA rules.

## Dependencies

Modules 08, 14–15.

## Mobile-first screen requirements

Sync status, last success, conflict list, manual Sync button (do not rely only on background sync).

## Database changes

Idempotency unique indexes; conflict/flag tables or status columns if needed.

## Routes and authorization

Authenticated sync API; rate-limit considerations.

## Business rules and validation

- Server re-validates stock and totals policy
- Conflicts flagged—never silent discard/rewrite
- No offline UPI verification claims
- No guaranteed sync claims

## Files likely created or modified

Sync endpoints, services, IDB outbox, conflict UI.

## Error and empty states

Conflict resolution UI; retry failures.

## Automated test cases

Idempotent double-submit; stock conflict path; success path.

## Acceptance criteria

- [ ] Idempotent sync
- [ ] Conflicts visible
- [ ] Tests run; docs honest about limits

## Documentation updates required

Schema, progress, offline runbook.

## Status

Deferred until requested.
