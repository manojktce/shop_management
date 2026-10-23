# Module 14 — PWA installation and application-shell caching

## Objective and scope

Add installable PWA shell (manifest + service worker caching static shell). **No offline billing.** Only when explicitly requested.

## Existing code to reuse

Vite build; admin layout assets. Follow `.cursor/rules/pwa-and-offline.mdc`.

## Dependencies

Stable online app (through module 13 ideally).

## Mobile-first screen requirements

Install prompt UX if appropriate; clear “online-only” indicators until modules 15–16.

## Database changes

None.

## Routes and authorization

Static `manifest` / SW; no auth bypass.

## Business rules and validation

- Cache shell/assets only; do not claim offline sales
- No credentials in browser storage

## Files likely created or modified

`public/manifest.webmanifest`, service worker, Vite plugin or manual registration, layout head links.

## Error and empty states

SW update/offline shell fallback page.

## Automated test cases

Limited (manifest reachable); manual install checklist.

## Acceptance criteria

- [ ] Installable on Android Chrome
- [ ] Shell caches; billing not claimed offline
- [ ] Docs warn limitations

## Documentation updates required

Progress; PWA notes in guide.

## Status

Deferred until requested.
