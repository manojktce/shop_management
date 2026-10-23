# Module 07 — Customer management (shop)

## Objective and scope

Dedicated shop **customers** for billing and credit—separate from staff `users`. Replace the boilerplate users-based Customer CRUD.

## Existing code to reuse

- CRUD/DataTables/form patterns from current `CustomerController` / views / `customer.*` permissions
- Sidebar entry and route name `customers` can be kept, but model becomes `App\Models\Customer`
- Do **not** require login passwords for shop patrons

## Dependencies

Module 02 helpful for mobile forms. Unblocked: model decision locked.

## Mobile-first screen requirements

Searchable customer list; quick add (name + mobile); credit info read-only from ledger once module 10 exists.

## Database changes

**Decided:** table `customers`

- name, mobile (unique nullable), email nullable, address, credit_limit DECIMAL(14,2), is_active, timestamps, softDeletes
- Opening balance via ledger only (module 10)

Also in this module (or tightly coupled cleanup):

- Stop using `User` + role `Customer` for shop patrons
- Remove or repurpose seed demo `customer@example.com` if it conflicts with the new model
- Keep Spatie role name `Customer` only if still needed for something else; otherwise leave roles for staff (Super Admin / Admin) and document cleanup

## Routes and authorization

Keep `customers` resource + `customer.*` permissions; point controller at new model.

## Business rules and validation

- Unique mobile when provided
- Do not allow editing derived balance
- INR credit_limit as DECIMAL(14,2)

## Files likely created or modified

- Migration `customers`, model `Customer`
- Rewrite `CustomerController`, DataTable, views for new fields
- Seeders, factories, tests
- Avoid breaking Admin/Super Admin `users`

## Error and empty states

Empty customer list; duplicate mobile/email errors.

## Automated test cases

CRUD on `customers`; permission gates; no auth login required for customer records.

## Acceptance criteria

- [x] Model decision: dedicated `customers` table
- [ ] Users-based Customer CRUD replaced
- [ ] Mobile-friendly CRUD
- [ ] Staff auth unaffected
- [ ] Tests run

## Documentation updates required

Schema (done), progress, this spec after implementation.

## Status

**Unblocked** — ready when implementation reaches this module.

## Resolved questions

- Shop customers do **not** log in via `users`.
- Email optional; mobile preferred identifier.
- Credit limit column OK; balance from ledger later.
