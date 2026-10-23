# Module 04 — Products and product types

## Objective and scope

Manage products linked to categories. Product **type** is an **enum/string column** on `products` (no `product_types` table).

## Existing code to reuse

CRUD/DataTables/forms; Category model from module 03.

## Dependencies

Module 03 (categories, units may be needed later for variants).

## Mobile-first screen requirements

Product list/filter; create/edit with category and type; active toggle.

## Database changes

- `products` with `type` enum/string column (values chosen at implementation, e.g. `goods` / `service`)
- FK to `categories`
- No `product_types` table

## Routes and authorization

`products` resource; `product.*` permissions; sidebar under catalogue group.

## Business rules and validation

- Required name + category; unique slug/SKU base if used
- Cannot assign inactive category if that policy is chosen

## Files likely created or modified

Models, migration, controller, DataTable, views, seeder, sidebar, routes.

## Error and empty states

No categories yet → prompt to create category; validation errors.

## Automated test cases

CRUD + permission + category FK validation.

## Acceptance criteria

- [ ] Products CRUD wired to categories
- [ ] Permissions and mobile UI
- [ ] Tests run

## Documentation updates required

Schema (finalize type modeling), progress.

## Status

Not started.
