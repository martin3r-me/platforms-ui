{{--
Info Display Atom
Zweck: Anzeige von Informationen mit Label
Props: label, value, variant (muted, primary, success, warning, danger)
Beispiel: <x-ui-info-display label="Auswahl" value="$companyDisplay" />
--}}

@props([
    'label' => '',
    'value' => '',
    'variant' => 'muted',
    'fallback' => '–',
])

@php
    $textColor = match($variant) {
        'primary' => 'text-primary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        default => 'text-muted'
    };
@endphp

<div>
    @if($label)
        <label class="block text-sm font-medium mb-1">{{ $label }}</label>
    @endif
    
    <div class="text-sm {{ $textColor }} py-2">
        {{ $value ?: $fallback }}
    </div>
</div>
