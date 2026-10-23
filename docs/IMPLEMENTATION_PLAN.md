# Implementation plan

One module at a time. Do not implement the full list in a single Agent session.

## Module order (dependency-aware)

Adjusted for this repo: boilerplate already includes auth, roles, dashboard, and **Customers-as-Users** CRUD.

| # | Module | Spec | Notes |
|---|--------|------|--------|
| 01 | Boilerplate review & conventions | `01-boilerplate-review.md` | Largely done by rules/docs task; keep as checklist |
| 02 | Foundation / mobile-first layout | `02-foundation-mobile-layout.md` | Responsive tweaks only; no theme replace |
| 03 | Categories & units | `03-categories-and-units.md` | Catalogue foundation |
| 04 | Products & product types | `04-products-and-types.md` | Depends on 03 |
| 05 | Variants & pricing | `05-variants-and-pricing.md` | Depends on 04 |
| 06 | Stock & movements | `06-stock-management.md` | Depends on 05 |
| 07 | Customer management (shop) | `07-customer-management.md` | **Extend or separate from existing User-Customer** — decide first |
| 08 | Billing / POS | `08-billing-pos.md` | Depends on 05–07 |
| 09 | Invoices & receipts | `09-invoices-and-receipts.md` | Depends on 08 |
| 10 | Payments & credit ledger | `10-payments-and-ledger.md` | Depends on 07–08 |
| 11 | Daily cash register | `11-cash-register.md` | Depends on 08–10 |
| 12 | Expenses | `12-expenses.md` | Distinct from stock purchases |
| 13 | Dashboard stats & reports | `13-dashboard-and-reports.md` | Depends on prior data |
| 14 | PWA install & shell cache | `14-pwa-shell.md` | Only when requested |
| 15 | Offline catalogue & draft billing | `15-offline-catalogue-drafts.md` | Only when requested |
| 16 | Offline sale sync | `16-offline-sale-sync.md` | Only when requested |
| 17 | Security, regression, deployment | `17-final-hardening.md` | Last |

## Standard workflow (every module)

1. Read `.cursor/rules/` and the module spec.
2. Inspect existing code and migrations.
3. Propose implementation plan + expected file changes.
4. Pause if a critical business decision is unresolved.
5. Implement only that module.
6. Run migrations/tests safely in local environment.
7. Review mobile layouts (~360px) when UI is involved.
8. Inspect Git diff; revert unrelated edits.
9. Update `DATABASE_SCHEMA.md`, this plan (if order changes), `IMPLEMENTATION_PROGRESS.md`, and the module spec status.
10. Report results and stop for review.

## Out of scope for planning-only sessions

- Creating shop tables early
- Installing packages without agreement
- PWA/offline implementation
- Replacing Bootstrap admin theme or auth
