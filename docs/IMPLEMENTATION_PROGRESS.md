# Implementation progress

Last updated: 2026-10-23

| # | Module | Status | Notes |
|---|--------|--------|--------|
| 01 | Boilerplate review & conventions | **Done (docs/rules)** | Cursor rules + planning docs created; no code changes to app |
| 02 | Foundation / mobile-first layout | **Done — pending review** | custom.css mobile rules; header app name; tests green |
| 03 | Categories & units | Not started | |
| 04 | Products & product types | Not started | |
| 05 | Variants & pricing | Not started | |
| 06 | Stock & movements | Not started | |
| 07 | Customer management (shop) | Ready to implement (when reached) | **Decided:** dedicated `customers` table; replace users-based Customer CRUD |
| 08 | Billing / POS | Not started | |
| 09 | Invoices & receipts | Not started | |
| 10 | Payments & credit ledger | Not started | |
| 11 | Daily cash register | Not started | |
| 12 | Expenses | Not started | |
| 13 | Dashboard stats & reports | Not started | |
| 14 | PWA install & shell cache | Deferred | Do not start until requested |
| 15 | Offline catalogue & drafts | Deferred | |
| 16 | Offline sale sync | Deferred | |
| 17 | Final hardening | Not started | |

## Session log

| Date | Work | Outcome |
|------|------|---------|
| 2026-10-23 | Inspect repo; add `.cursor/rules/*.mdc` and `docs/*` | Waiting for review; no shop modules implemented |
| 2026-10-23 | Lock business decisions | Separate customers; type enum; no neg stock; bill GST; INR 2dp; PHP 8.3 |
| 2026-10-23 | Basic setup + Module 02 | Seeded DB; mobile CSS; foundation tests; phpunit → MySQL test DB |
