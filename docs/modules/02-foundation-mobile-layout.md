# Module 02 — Foundation and shared mobile-first layout

## Objective and scope

Make the **existing** Modernize/Bootstrap admin usable on phones (~360px): responsive content, touch-friendly controls, no horizontal scroll on core chrome. Do **not** replace the theme or navigation system.

## Existing code to reuse

- `resources/views/backend/components/layouts/*`
- `public/assets/backend/css/custom.css` (preferred override point)
- Header/sidebar partials; Bootstrap utility classes already available

## Dependencies

Module 01 conventions.

## Mobile-first screen requirements

- Sidebar collapses via existing theme toggler; content readable at 360px
- Forms stack; DataTables usable (horizontal scroll isolated to table region if unavoidable)
- Optional: sticky action bars pattern documented for later POS (implement lightly if needed)
- Desktop sidebar/topbar retained

## Database changes

None.

## Routes and authorization

None.

## Business rules and validation

N/A.

## Files likely created or modified

- `public/assets/backend/css/custom.css`
- Possibly layout/header/sidebar Blade tweaks
- Small shared partials only if necessary

## Error and empty states

Ensure alerts/sweetalert remain visible on small screens.

## Automated test cases

Smoke: authenticated dashboard returns 200 (feature test optional).

## Acceptance criteria

- [ ] Dashboard, customer list, customer form usable at ~360px without page-level horizontal scroll
- [ ] Desktop layout not broken
- [ ] No new CSS framework; theme not replaced

## Documentation updates required

Progress tracker; note any new shared UI patterns in `PROJECT_GUIDE.md`.

## Status

Not started.
