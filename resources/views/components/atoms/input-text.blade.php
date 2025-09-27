{{--
  Component: Input Text (Atom)
  Zweck: Text-Eingabefeld mit Label und Validierung.
  Props:
    - name: string - Feld-Name
    - label: string|null - Label-Text
    - value: string|null - Aktueller Wert
    - variant: string - primary, secondary, danger, success, warning
    - size: string - xs, sm, md, lg, xl
    - errorKey: string|null - Error-Key für Validierung
    - type: string - input type (text, email, password, etc.)
    - required: bool - Pflichtfeld
    - placeholder: string|null - Platzhalter-Text
    - autocomplete: string|null - Autocomplete-Attribut
  Beispiel:
    <x-ui-input-text name="email" label="E-Mail" type="email" required />
--}}

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

@php
    $errorKey = $errorKey ?: $name;
    $sizeClass = match($size) {
        'xs' => 'input-xs',
        'sm' => 'input-sm',
        'lg' => 'input-lg',
        'xl' => 'input-xl',
        default => '',
    };
    
    $variantClasses = match($variant) {
        'primary' => 'border-primary focus:border-primary focus-ring-primary',
        'secondary' => 'border-muted focus:border-muted focus-ring-muted',
        'success' => 'border-success focus:border-success focus-ring-success',
        'warning' => 'border-warning focus:border-warning focus-ring-warning',
        'danger' => 'border-danger focus:border-danger focus-ring-danger',
        default => 'border-primary focus:border-primary focus-ring-primary'
    };
@endphp

<div class="form-group">
    @if($label)
        <x-ui-label :for="$name" :text="$label" :variant="$variant" :required="$required" :size="$size" class="mb-1"/>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if($required) required @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        {{ $attributes->merge([
            'class' => implode(' ', [
                'form-control',
                $variantClasses,
                $sizeClass,
            ]),
        ]) }}
    />

    @error($errorKey)
        <span class="form-error mt-1">{{ $message }}</span>
    @enderror
</div>
