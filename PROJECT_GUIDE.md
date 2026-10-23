# Project guide — Shop management

Mobile-first shop management application built on the existing Laravel admin boilerplate. This guide orients humans and Cursor Agent. It does not replace module specs under `docs/modules/`.

## What this project is

An admin-authenticated shop system for catalogue, stock, customers, billing/POS, payments/credit, cash register, expenses, and later optional PWA/offline support.

It is **not** a greenfield Laravel app. The Sumanas / Modernize Bootstrap admin panel, session auth, Spatie roles/permissions, and CRUD scaffolding already exist and must be preserved.

## Stack summary

| Area | Actual choice |
|------|----------------|
| Backend | Laravel `^13.8`, PHP `^8.3` |
| Database | MySQL (`DB_*` in `.env`; tests use sqlite `:memory:`) |
| Admin URL prefix | `ADMIN_PATH` (default `webadmin`) |
| Auth | Session (`LoginController`), password reset, profile |
| Authorization | `spatie/laravel-permission` (`permission`, `role` middleware) |
| Admin UI | Blade + Bootstrap 5 + Tabler icons (`public/assets/backend`) |
| Lists | Yajra DataTables |
| Forms HTML | `spatie/laravel-html` |
| Front build | Vite 8, Vue 3, Tailwind 4 (admin primarily Bootstrap assets) |
| Tests | Pest 4 + `php artisan test` |
| Code style | Laravel Pint |

**Runtime:** PHP 8.3+ confirmed. Currency **INR** with two decimal places.

## Locked business decisions

| Topic | Decision |
|-------|----------|
| Customers | Separate `customers` table (not staff `users`) |
| Product types | Enum/string column on `products` |
| Negative stock | Not allowed |
| Tax / GST | Bill-level only (not product-wise) |
| Money | INR, `DECIMAL(14,2)` |

Details: `docs/DATABASE_SCHEMA.md`.

## Directory map (backend)

```
app/Http/Controllers/Backend/   # Admin controllers (BaseController + Crud)
app/DataTables/Backend/         # Yajra DataTable classes
app/Traits/Backend/             # Crud + Media traits
app/Models/                     # Eloquent (currently User only)
app/Helpers/Helpers.php         # baseURL(), badges(), dateFormat(), …
resources/views/backend/        # Layouts, components, module views
routes/backend.php              # Admin routes
public/assets/backend/          # Theme CSS/JS/plugins (do not replace)
database/migrations/            # users, cache, jobs, permission tables
database/seeders/               # roles, permissions, demo users
docs/                           # Schema, plan, progress, module specs
.cursor/rules/                  # Cursor agent rules (.mdc)
```

## Existing features (reuse)

- Login / logout / forgot & reset password
- Dashboard shell
- Profile account page
- Roles CRUD with permission matrix
- Customers CRUD (**users** with role `Customer`)
- Sidebar permission filtering
- Form Blade components, SweetAlert, DataTables chrome
- CRUD transactions, soft deletes on users

## Not built yet (shop domain)

Categories, units, products, variants, stock movements, shop customer ledger (beyond user accounts), POS/billing, invoices, payments allocations, cash sessions, expenses, reports, PWA/offline.

## Conventions for new modules

1. Controller extends `Backend\BaseController`, sets `$permission`, `$module`, `$model`.
2. Seed `{module}.list|create|edit|delete` in `RolePermissionSeeder`.
3. Add sidebar entry with matching permission.
4. Views under `resources/views/backend/{module}/`.
5. DataTable under `app/DataTables/Backend/`.
6. Prefer DECIMAL for money/qty; auditable movements; transactions for multi-table writes.
7. Mobile-first at 360px using Bootstrap utilities and existing components.

## Documentation index

| File | Purpose |
|------|---------|
| `docs/DATABASE_SCHEMA.md` | Proposed + existing schema |
| `docs/IMPLEMENTATION_PLAN.md` | Module order and workflow |
| `docs/IMPLEMENTATION_PROGRESS.md` | Status tracker |
| `docs/modules/*.md` | Per-module specifications |

## Implementation workflow

See `docs/IMPLEMENTATION_PLAN.md`. One module per Agent session; stop for review after each.

## Constraints

- No new Laravel project; no theme/auth rewrite; no drive-by refactors.
- No package installs without justification.
- No PWA/offline until those modules are requested.
- No secrets in Markdown.
