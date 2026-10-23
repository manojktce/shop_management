# Module 05 — Product variants and pricing

## Objective and scope

Variants per product with SKU, unit, cost/sell prices, reorder level, active flag.

## Existing code to reuse

Product CRUD; units; DECIMAL conventions from rules.

## Dependencies

Modules 03–04.

## Mobile-first screen requirements

Variant management from product edit or dedicated screens; clear price fields; no horizontal overflow on forms.

## Database changes

`product_variants` with DECIMAL prices/qty fields; unique SKU; FK product + unit.

## Routes and authorization

Nested or flat `product-variants` / variants routes; `product_variant.*` or manage under `product.edit`—prefer explicit permissions unless UX demands nesting only.

## Business rules and validation

- Unique SKU; sell/cost >= 0; required unit
- Prices stored as DECIMAL; no float math in PHP (use `bcmul`/`bcadd` or integer minor units if adopted later)

## Files likely created or modified

Migration, `ProductVariant` model + relations, controllers/views/DataTables, permissions.

## Error and empty states

Product with zero variants messaging for later POS.

## Automated test cases

Unique SKU; decimal persistence; permission checks.

## Acceptance criteria

- [ ] Variants CRUD with pricing
- [ ] Tests run; mobile OK

## Documentation updates required

Schema, progress.

## Status

Not started.
