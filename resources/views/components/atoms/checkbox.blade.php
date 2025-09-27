{{--
  Component: Checkbox (Atom)
  Zweck: Interaktive Checkbox mit Icon und Text.
  Props:
    - model: string - Livewire model binding
    - checkedLabel: string - Text wenn aktiv
    - uncheckedLabel: string - Text wenn inaktiv
    - size: string - xs, sm, md, lg
    - disabled: bool - Deaktiviert
    - block: bool - Volle Breite
    - icon: string|null - Icon HTML
    - variant: string - success, warning, danger, info, primary
  Beispiel:
    <x-ui-checkbox model="task.is_done" checked-label="Erledigt" unchecked-label="Als erledigt markieren" />
--}}

@props([
    'model',
    'checkedLabel' => 'Erledigt',
    'uncheckedLabel' => 'Als erledigt markieren',
    'size' => 'md',
    'disabled' => false,
    'block' => false,
    'icon' => null,
    'variant' => 'success'
])

@php
    $sizes = [
        'xs' => 'py-1 px-2 text-xs',
        'sm' => 'py-1 px-3 text-sm',
        'md' => 'py-2 px-4 text-md',
        'lg' => 'py-3 px-5 text-lg',
    ];
    $classes = $sizes[$size] ?? $sizes['md'];
    $blockClass = $block ? 'w-full d-block' : '';
    
    $variantClasses = match($variant) {
        'success' => 'bg-success text-on-success hover:bg-success-60',
        'warning' => 'bg-warning text-on-warning hover:bg-warning-60',
        'danger' => 'bg-danger text-on-danger hover:bg-danger-60',
        'info' => 'bg-info text-on-info hover:bg-info-60',
        'primary' => 'bg-primary text-on-primary hover:bg-primary-60',
        default => 'bg-success text-on-success hover:bg-success-60'
    };
    
    $uncheckedClasses = match($variant) {
        'success' => 'bg-transparent border-1 border-success border-solid text-success hover:bg-success hover:text-on-success',
        'warning' => 'bg-transparent border-1 border-warning border-solid text-warning hover:bg-warning hover:text-on-warning',
        'danger' => 'bg-transparent border-1 border-danger border-solid text-danger hover:bg-danger hover:text-on-danger',
        'info' => 'bg-transparent border-1 border-info border-solid text-info hover:bg-info hover:text-on-info',
        'primary' => 'bg-transparent border-1 border-primary border-solid text-primary hover:bg-primary hover:text-on-primary',
        default => 'bg-transparent border-1 border-success border-solid text-success hover:bg-success hover:text-on-success'
    };
@endphp

<button
    type="button"
    x-data="{ checked: @entangle($model) }"
    @click="if(!{{ $disabled ? 'true' : 'false' }}) checked = !checked"
    x-effect="$wire.set('{{ $model }}', checked)"
    :class="checked ? '{{ $variantClasses }}' : '{{ $uncheckedClasses }}'"
    class="rounded-md border-0 transition hover-scale-up shadow-sm font-medium d-inline-flex align-center justify-center gap-2 {{ $classes }} {{ $disabled ? 'opacity-60 pointer-events-none' : '' }} {{ $blockClass }}"
    :disabled="{{ $disabled ? 'true' : 'false' }}"
>
    @if($icon)
        <div class="flex items-center justify-center self-center">
            @if(is_string($icon))
                {!! $icon !!}
            @else
                <x-dynamic-component :component="$icon" class="w-4 h-4" />
            @endif
        </div>
    @endif
    <span x-text="checked ? '{{ $checkedLabel }}' : '{{ $uncheckedLabel }}'"></span>
</button>
