## UI Package – Developer Guide

Dieses Paket stellt ein leichtgewichtiges Designsystem via CSS Custom Properties und Utility-Klassen bereit. Farben, Typografie und Oberflächen lassen sich über `.env` steuern; das Paket rendert daraus automatisch nutzbare Klassen.

### Inhalt

- Überblick & Architektur
- Farb-Setup (ENV → Config → CSS-Variablen → Utilities)
- Verfügbare Farben & Klassen
- Neue Farben hinzufügen
- Typografie/Schriften austauschen
- Einbindung & Build
- Troubleshooting

---

### Überblick & Architektur

- `.env` definiert Werte (RGB/Hex) für Farben, On-Text und Typografie.
- `config('ui')` liest die `.env`-Werte ein und stellt sie zentral bereit.
- `x-ui-styles` rendert daraus `:root`-Variablen und Utility-Klassen.
- SCSS-Utilities (`resources/assets/scss`) ergänzen generische Hilfsklassen.

Codefluss:

```5:29:platform/ui/resources/views/components/ui-styles.blade.php
<style>
:root {
    /* ===== Farben & on-Color (auto aus config/ui.php) ===== */
    @foreach(config('ui.colors') as $key => $c)
        --ui-{{ $key }}-rgb: {{ $c['rgb'] }};
        --ui-{{ $key }}: rgb(var(--ui-{{ $key }}-rgb));
        --ui-on-{{ $key }}: {{ $c['on'] }};
        --ui-{{ $key }}-5:   rgba(var(--ui-{{ $key }}-rgb), 0.05);
        --ui-{{ $key }}-10:  rgba(var(--ui-{{ $key }}-rgb), 0.10);
        --ui-{{ $key }}-20:  rgba(var(--ui-{{ $key }}-rgb), 0.20);
        --ui-{{ $key }}-50:  rgba(var(--ui-{{ $key }}-rgb), 0.50);
        --ui-{{ $key }}-60:  rgba(var(--ui-{{ $key }}-rgb), 0.60);
        --ui-{{ $key }}-80:  rgba(var(--ui-{{ $key }}-rgb), 0.80);
        --ui-{{ $key }}-90:  rgba(var(--ui-{{ $key }}-rgb), 0.90);
    @endforeach
```

---

### Farb-Setup

ENV → Config:

```5:16:platform/ui/config/ui.php
// ===== Farben (nur als RGB!) & Textfarbe ("on") =====
'colors' => [
    'primary'   => ['rgb' => env('UI_PRIMARY_RGB',   '79,70,229'),    'on' => env('UI_ON_PRIMARY',   '#fff')],
    'secondary' => ['rgb' => env('UI_SECONDARY_RGB', '107,114,128'),  'on' => env('UI_ON_SECONDARY', '#fff')],
    'success'   => ['rgb' => env('UI_SUCCESS_RGB',   '16,185,129'),   'on' => env('UI_ON_SUCCESS',   '#fff')],
    'danger'    => ['rgb' => env('UI_DANGER_RGB',    '239,68,68'),    'on' => env('UI_ON_DANGER',    '#fff')],
    'warning'   => ['rgb' => env('UI_WARNING_RGB',   '245,158,11'),   'on' => env('UI_ON_WARNING',   '#000')],
    'info'      => ['rgb' => env('UI_INFO_RGB',      '59,130,246'),   'on' => env('UI_ON_INFO',      '#fff')],
    'black'     => ['rgb' => env('UI_BLACK_RGB',     '31,41,55'),     'on' => env('UI_ON_BLACK',     '#fff')],
    'white'     => ['rgb' => env('UI_WHITE_RGB',     '255,255,255'),  'on' => env('UI_ON_WHITE',     '#111')],
    'muted'     => ['rgb' => env('UI_MUTED_RGB',     '203,213,225'),  'on' => env('UI_ON_MUTED',     '#1F2937')],
],
```

Konventionen:

- Basis-/Statusfarben: UI\_<NAME>\_RGB="r, g, b" (RGB ohne Klammern, mit Leerzeichen ok).
- On‑Text: UI*ON*<NAME>="#hex" (Hex, keine Transparenz nötig).
- Surfaces/Body: UI_BODY_BG, UI_BODY_COLOR, UI_SURFACE_BG, UI_SURFACE_COLOR (Hex).
- Border: UI_BORDER als `rgba(...)` (feste Transparenz).

Beispiel `.env.example`:

```env
# Main/Status (RGB)
UI_PRIMARY_RGB="0,184,148"
UI_SECONDARY_RGB="19,74,61"
UI_SUCCESS_RGB="0,184,148"
UI_WARNING_RGB="255, 255, 100"
UI_DANGER_RGB="255, 60, 80"
UI_INFO_RGB="80, 230, 250"
UI_BLACK_RGB="31, 41, 55"
UI_WHITE_RGB="255, 255, 255"
UI_MUTED_RGB="203, 213, 225"

# On-Text (Hex)
UI_ON_PRIMARY="#ffffff"
UI_ON_SECONDARY="#ffffff"
UI_ON_SUCCESS="#ffffff"
UI_ON_WARNING="#000000"
UI_ON_DANGER="#ffffff"
UI_ON_INFO="#ffffff"
UI_ON_BLACK="#ffffff"
UI_ON_WHITE="#111111"
UI_ON_MUTED="#1F2937"

# Surfaces/Body/Border
UI_BODY_BG="#f9fafb"
UI_BODY_COLOR="#1F2937"
UI_SURFACE_BG="#ffffff"
UI_SURFACE_COLOR="#1F2937"
UI_BORDER="rgba(0,0,0,.08)"
```

---

### Verfügbare Farben & Klassen

Für jede Farbe in `config('ui.colors')` werden automatisch Variablen und Klassen erzeugt:

- Variablen:
  - `--ui-<name>` und Alpha-Stufen: `--ui-<name>-{5,10,20,50,60,80,90}`
  - On‑Text: `--ui-on-<name>`
- Utility-Klassen:
  - Hintergrund: `.bg-<name>`, `.bg-<name>-20`, `.hover:bg-<name>`
  - Text: `.text-<name>`, `.text-on-<name>`
  - Border: `.border-<name>`, `.border-top-<name>` …
  - Focus-Ring: `.focus-ring-<name>`

Beispiele:

```html
<div class="bg-primary text-on-primary p-4">Primary</div>
<button class="bg-warning-20 hover:bg-warning text-warning border-warning">
  Warnung
</button>
<input class="focus-ring-info border p-2" />
```

---

### Neue Farben hinzufügen

1. `.env` ergänzen:

```env
UI_ACCENT_RGB="58,141,255"
UI_ON_ACCENT="#ffffff"
```

2. `platform/ui/config/ui.php` unter `colors` erweitern:

```php
'accent' => ['rgb' => env('UI_ACCENT_RGB', '58,141,255'), 'on' => env('UI_ON_ACCENT', '#fff')],
```

3. Cache leeren:

```bash
php artisan config:clear
```

4. Verwenden:

- `.bg-accent`, `.bg-accent-20`, `.text-on-accent`, `.border-accent`, `.focus-ring-accent`

---

### Typografie/Schriften austauschen

**Hinweis:** Lokale Fonts werden in der Hauptanwendung verwaltet, nicht im UI-Package.

ENV-Variablen:

```33:35:platform/ui/config/ui.php
'font_sans' => env('UI_FONT_SANS', "system-ui, -apple-system, 'Segoe UI', sans-serif"),
'font_mono' => env('UI_FONT_MONO', "ui-monospace, 'SFMono-Regular', monospace"),
```

1. `.env` setzen:

```env
UI_FONT_SANS="'Satoshi', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif"
UI_FONT_MONO="'JetBrains Mono', ui-monospace, 'SFMono-Regular', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', monospace"
UI_FONT_HEADINGS="'Clash Display', 'JetBrains Mono', ui-monospace, 'SFMono-Regular', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', monospace"
```

2. Fonts in Hauptanwendung laden:

- Font-Dateien in `public/fonts/` ablegen
- CSS-Datei `public/css/fonts.css` mit `@font-face` Definitionen erstellen
- CSS-Datei in Layouts einbinden: `<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">`

3. Anwenden:

- Tokens werden als `--ui-font-sans`, `--ui-font-mono` und `--ui-font-headings` gesetzt.
- Automatische Anwendung über CSS-Variablen:

```css
body {
  font-family: var(--ui-font-sans);
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: var(--ui-font-headings);
}
code,
pre {
  font-family: var(--ui-font-mono);
}
```

---

### Einbindung & Build

- Einbindung der Variablen/Klassen im Layout:

```blade
<x-ui-styles />
```

- SCSS build (falls benötigt):

```json
{
  "scripts": {
    "build": "npm run build:expanded && npm run build:min",
    "build:expanded": "sass resources/assets/scss/ui.scss resources/assets/css/ui.css --no-source-map --style=expanded",
    "build:min": "sass resources/assets/scss/ui.scss resources/assets/css/ui.min.css --no-source-map --style=compressed"
  }
}
```

---

### Troubleshooting

- Änderungen an `.env` werden nicht wirksam:
  - `php artisan config:clear`
- Transparenz benötigt? Nutze die generierten Alpha‑Stufen (`-5, -10, -20, …`) oder setze einen eigenen `rgba(...)` Wert.
- Falscher ENV-Key:
  - Basisfarben immer als `*_RGB` (z. B. `UI_WARNING_RGB`).
- On‑Text‑Kontrast:
  - Passe `UI_ON_<NAME>` an, wenn Lesbarkeit nicht ausreichend ist.
