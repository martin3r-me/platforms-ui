{{-- Wrapper: Weiterleitung auf neue Atomic-Komponente --}}
@props([
    'name',
    'label' => null,
    'options' => [],
    'nullable' => false,
    'nullLabel' => '– Kein Wert –',
    'variant' => 'primary',
    'size' => 'md',
    'errorKey' => null,
    'required' => false,
    'disabled' => false,
    'autocomplete' => null,
    'optionValue' => 'value',
    'optionLabel' => 'label',
    'value' => null,
])

<x-ui-input-select
    {{ $attributes }}
    :name="$name"
    :label="$label"
    :options="$options"
    :nullable="$nullable"
    :nullLabel="$nullLabel"
    :variant="$variant"
    :size="$size"
    :errorKey="$errorKey"
    :required="$required"
    :disabled="$disabled"
    :autocomplete="$autocomplete"
    :optionValue="$optionValue"
    :optionLabel="$optionLabel"
    :value="$value"
/>