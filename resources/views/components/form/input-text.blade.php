{{-- Wrapper: Weiterleitung auf neue Atomic-Komponente --}}
@props([
    'name',
    'label' => null,
    'value' => null,
    'variant' => 'primary',
    'size' => 'md',
    'errorKey' => null,
    'type' => 'text',
    'required' => false,
    'placeholder' => null,
    'autocomplete' => null,
])

<x-ui-input-text
    {{ $attributes }}
    :name="$name"
    :label="$label"
    :value="$value"
    :variant="$variant"
    :size="$size"
    :errorKey="$errorKey"
    :type="$type"
    :required="$required"
    :placeholder="$placeholder"
    :autocomplete="$autocomplete"
/>