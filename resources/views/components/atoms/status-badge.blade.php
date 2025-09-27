{{--
  Component: Status Badge (Atom)
  Zweck: Badge für Status-Anzeigen mit Icon und Text.
  Props:
    - status: string - Status-Wert
    - label: string - Anzuzeigender Text
    - icon: string|null - Icon-Name (optional)
  Beispiel:
    <x-ui-status-badge status="completed" label="Erledigt" icon="heroicon-o-check-circle" />
--}}

@props([
    'status' => 'default',
    'label' => '',
    'icon' => null
])

@php
    $variant = match($status) {
        'completed', 'done', 'success' => 'success',
        'pending', 'open', 'warning' => 'warning',
        'error', 'failed', 'danger' => 'danger',
        'info' => 'info',
        'frog', 'important' => 'warning',
        default => 'secondary'
    };
    
    $variantClasses = match($variant) {
        'success' => 'bg-success-20 text-success border-success',
        'warning' => 'bg-warning-20 text-warning border-warning',
        'danger' => 'bg-danger-20 text-danger border-danger',
        'info' => 'bg-info-20 text-info border-info',
        default => 'bg-muted-20 text-muted border-muted'
    };
@endphp

<div class="d-flex items-center gap-2 p-2 border rounded-md {{ $variantClasses }}">
    @if($icon)
        <div class="flex items-center justify-center">
            @svg($icon, 'w-4 h-4')
        </div>
    @endif
    <span class="text-sm font-medium">{{ $label }}</span>
</div>
