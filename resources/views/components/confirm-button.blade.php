{{--
Confirm Button Wrapper (Adapter)
Zweck: Weiterleitung auf neue Atom-Komponente für Rückwärtskompatibilität
--}}

@props([
    'action' => '',
    'value' => null,
    'text' => 'Löschen',
    'confirmText' => 'Wirklich löschen?',
    'class' => '',
    'variant' => 'muted',
    'icon' => null,
])

<x-ui-atoms-confirm-button
    :action="$action"
    :value="$value"
    :text="$text"
    :confirmText="$confirmText"
    :variant="$variant"
    :icon="$icon"
    :class="$class"
/>