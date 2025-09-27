@props([
    'model' => null,
    'checkedLabel' => 'Aktiviert',
    'uncheckedLabel' => 'Deaktiviert',
    'size' => 'md',
    'disabled' => false,
    'block' => false,
    'icon' => null,
    'variant' => 'primary',
])

{{-- Wrapper: Weiterleitung auf neue Atomic-Komponente --}}
<x-ui-checkbox
    {{ $attributes }}
    :model="$model"
    :checked-label="$checkedLabel"
    :unchecked-label="$uncheckedLabel"
    :size="$size"
    :disabled="$disabled"
    :block="$block"
    :icon="$icon"
    :variant="$variant"
/>