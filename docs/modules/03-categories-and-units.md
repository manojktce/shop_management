# Module 03 — Categories and units

## Objective and scope

CRUD for product categories and units of measure as catalogue foundation.

## Existing code to reuse

`BaseController` Crud pattern, DataTables, form components, permission seeding, sidebar.

## Dependencies

Module 01–02 recommended (02 can be parallel if needed).

## Mobile-first screen requirements

List + create/edit forms for categories and units; compact fields; permission-gated menu entries.

## Database changes

- `categories` (optional self-FK `parent_id`)
- `units` (`name`, unique `symbol` or short code)

See `docs/DATABASE_SCHEMA.md`.

## Routes and authorization

- `categories` and `units` resources under admin auth
- Permissions: `category.*`, `unit.*` (list/create/edit/delete)
- Seed + sidebar

## Business rules and validation

- Unique category name/slug as agreed; prevent delete if products exist (restrict or soft-block)
- Unique unit symbol; prevent delete if variants reference unit

## Files likely created or modified

- Migrations, models `Category`, `Unit`
- `CategoryController`, `UnitController`, DataTables, views
- `RolePermissionSeeder`, `sidebar.blade.php`, `routes/backend.php`

## Error and empty states

Empty lists; validation errors; delete blocked when in use.

## Automated test cases

- Admin with permission can CRUD; without permission gets 403
- Validation rejects missing name / duplicate symbol
- Delete blocked when referenced (once products exist—may stub later)

## Acceptance criteria

- [ ] Migrations applied locally
- [ ] Full CRUD + permissions + sidebar
- [ ] Mobile forms usable at 360px
- [ ] Tests added and run

## Documentation updates required

Schema, progress, this spec status.

## Status

Not started.
