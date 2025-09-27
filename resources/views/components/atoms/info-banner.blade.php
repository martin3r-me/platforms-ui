{{--
Info Banner Atom
Zweck: Anzeige von Informationen mit Icon und Styling
Props: message, variant (info, success, warning, danger), icon
Beispiel: <x-ui-info-banner message="Der Task wird gedruckt" variant="info" />
--}}

@props([
    'message' => '',
    'variant' => 'info',
    'icon' => null,
    'class' => '',
])

@php
    $variantClasses = match($variant) {
        'success' => 'bg-success-20 text-success border-success',
        'warning' => 'bg-warning-20 text-warning border-warning',
        'danger' => 'bg-danger-20 text-danger border-danger',
        default => 'bg-info-20 text-info border-info'
    };
@endphp

<div class="text-xs {{ $variantClasses }} p-2 rounded border {{ $class }}">
    @if($icon)
        <div class="d-flex items-center gap-2">
            @if(is_string($icon))
                {!! $icon !!}
            @else
                <x-dynamic-component :component="$icon" class="w-5 h-5" />
            @endif
            <span><strong>Info:</strong> {{ $message }}</span>
        </div>
    @else
        <strong>Info:</strong> {{ $message }}
    @endif
</div>
