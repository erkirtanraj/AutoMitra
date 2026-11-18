# AutoMitra Color Tokens

Status: Proposed initial palette. Validate contrast in implemented components before release.

## Brand palette

| Token | Hex | Usage |
|---|---|---|
| brand.navy | #102A43 | Primary brand, dark headers |
| brand.blue | #2563EB | Primary actions and links |
| brand.blue-hover | #1D4ED8 | Hover/pressed action |
| brand.orange | #F59E0B | Highlights and attention accents |
| brand.orange-dark | #B45309 | Dark text/icon on light accent surfaces |
| brand.green | #15803D | Success and positive status |
| brand.red | #DC2626 | Errors and destructive actions |

## Neutral palette

| Token | Hex | Usage |
|---|---|---|
| neutral.0 | #FFFFFF | Cards and surfaces |
| neutral.50 | #F8FAFC | App background |
| neutral.100 | #F1F5F9 | Subtle surface |
| neutral.200 | #E2E8F0 | Borders |
| neutral.400 | #94A3B8 | Muted icons |
| neutral.500 | #64748B | Secondary text |
| neutral.700 | #334155 | Body text |
| neutral.900 | #172B4D | Primary text |

## Semantic tokens

| Token | Value | Usage |
|---|---|---|
| color.text.primary | #172B4D | Main text |
| color.text.secondary | #64748B | Supporting text |
| color.surface.page | #F8FAFC | Page background |
| color.surface.card | #FFFFFF | Cards |
| color.border.default | #E2E8F0 | Borders |
| color.action.primary | #2563EB | Main CTA |
| color.status.success | #15803D | Success |
| color.status.warning | #B45309 | Warning |
| color.status.danger | #DC2626 | Error/destructive |
| color.status.info | #1D4ED8 | Information |

## CSS variables

```css
:root {
  --am-brand-navy: #102A43;
  --am-brand-blue: #2563EB;
  --am-brand-blue-hover: #1D4ED8;
  --am-brand-orange: #F59E0B;
  --am-brand-green: #15803D;
  --am-brand-red: #DC2626;

  --am-neutral-0: #FFFFFF;
  --am-neutral-50: #F8FAFC;
  --am-neutral-100: #F1F5F9;
  --am-neutral-200: #E2E8F0;
  --am-neutral-400: #94A3B8;
  --am-neutral-500: #64748B;
  --am-neutral-700: #334155;
  --am-neutral-900: #172B4D;

  --am-text-primary: var(--am-neutral-900);
  --am-text-secondary: var(--am-neutral-500);
  --am-surface-page: var(--am-neutral-50);
  --am-surface-card: var(--am-neutral-0);
  --am-border-default: var(--am-neutral-200);
  --am-action-primary: var(--am-brand-blue);
}
```

## Usage rules

- Use navy for brand identity and high-level navigation.
- Use blue for primary interactive actions, not every decorative element.
- Use orange sparingly for highlights; ensure text contrast.
- Use semantic status colors consistently and pair them with text/icons.
- Never rely on color alone to communicate verification, errors or listing status.
- Do not use brand colors for long paragraphs or dense data tables.
- Verify text/background combinations against WCAG AA in the actual UI.
