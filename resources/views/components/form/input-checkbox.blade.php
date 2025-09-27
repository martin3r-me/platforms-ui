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