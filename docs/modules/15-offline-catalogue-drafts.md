# Module 15 — Offline catalogue and draft billing

## Objective and scope

Cache catalogue in IndexedDB; allow draft carts offline. **Do not finalize as committed sales without sync rules (module 16).** Only when requested.

## Existing code to reuse

Vite/Vue; PWA shell; online product APIs for sync-down.

## Dependencies

Module 14; online catalogue modules 03–05.

## Mobile-first screen requirements

Offline indicator; draft cart UI; last catalogue sync time.

## Database changes

Server: maybe `client_uuid` already on sales; no secrets in IDB.

## Routes and authorization

Authenticated catalogue sync endpoints; token/session strategy must be explicit and safe.

## Business rules and validation

- IDB for structured data; no payment secrets
- Drafts clearly labeled unsynced
- Caching ≠ correct billing

## Files likely created or modified

JS IDB layer, draft store, sync-down jobs/endpoints.

## Error and empty states

Stale catalogue warning; quota errors.

## Automated test cases

JS unit tests if present; feature tests for catalogue sync API.

## Acceptance criteria

- [ ] Catalogue readable offline
- [ ] Drafts persist; not silently finalized
- [ ] Limitations documented

## Documentation updates required

Progress; offline design notes.

## Status

Deferred until requested.
