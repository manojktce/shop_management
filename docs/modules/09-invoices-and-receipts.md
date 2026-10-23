# Module 09 — Invoices and receipts

## Objective and scope

Human-readable invoice/receipt for finalized sales: screen + print/PDF-friendly Blade. No silent regeneration that alters totals.

## Existing code to reuse

Sale models; layout Blank for print; shop branding placeholders (no secrets).

## Dependencies

Module 08.

## Mobile-first screen requirements

Readable receipt on phone; large total; print stylesheet optional.

## Database changes

Usually none beyond invoice_no already on `sales`.

## Routes and authorization

`sales/{id}/invoice` or `receipt`; `sale.show` / `sale.list` permission.

## Business rules and validation

- Only finalized (non-void) sales
- Display snapshot line data, not live product prices

## Files likely created or modified

Blade print views, controller methods, optional CSS print rules.

## Error and empty states

404/403; voided sale messaging.

## Automated test cases

Authorized user can view; guest cannot; voided handling.

## Acceptance criteria

- [ ] Invoice/receipt matches sale totals
- [ ] Mobile readable; print acceptable

## Documentation updates required

Progress; any invoice numbering rules.

## Status

Not started.
