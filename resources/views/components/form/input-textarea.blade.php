{{-- Wrapper: Weiterleitung auf neue Atomic-Komponente --}}
@props([
    'name',
    'label' => null,
    'value' => null,
    'variant' => 'primary',
    'size' => 'md',
    'errorKey' => null,
    'required' => false,
    'placeholder' => null,
    'rows' => 4,
])

<x-ui-input-textarea
    {{ $attributes }}
    :name="$name"
    :label="$label"
    :value="$value"
    :variant="$variant"
    :size="$size"
    :errorKey="$errorKey"
    :required="$required"
    :placeholder="$placeholder"
    :rows="$rows"
/>