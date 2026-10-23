# Module 01 — Boilerplate review and conventions

## Objective and scope

Document and lock conventions from the existing admin boilerplate so later modules stay consistent. **No shop features.**

## Existing code to reuse

Entire backend scaffolding: auth, roles, customers-as-users, Crud trait, DataTables, Blade components, `baseURL()`, Spatie permissions, Modernize assets.

## Dependencies

None.

## Mobile-first screen requirements

None beyond noting current admin is desktop-oriented sidebar layout.

## Database changes

None.

## Routes and authorization

Existing: `routes/backend.php` under `ADMIN_PATH`; `permission:{resource}.*` via Crud middleware.

## Business rules and validation

Preserve current role constants on `User`: Super Admin, Admin, Customer.

## Files likely created or modified

- `.cursor/rules/*.mdc`, `PROJECT_GUIDE.md`, `docs/**` (this planning task)
- Application PHP/Blade: **none required** for this module

## Error and empty states

N/A.

## Automated test cases

Keep existing Pest example tests green when environment allows.

## Acceptance criteria

- [x] Stack and conventions documented
- [x] Cursor rules present
- [x] Module plan ordered with dependency awareness
- [x] No unnecessary package installs or theme changes

## Documentation updates required

`PROJECT_GUIDE.md`, `docs/*`, progress tracker.

## Status

**Complete** for planning/rules (2026-10-23).
