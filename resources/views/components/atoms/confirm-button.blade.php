{{--
Confirm Button Atom
Zweck: Button mit Bestätigungslogik für kritische Aktionen
Props: action (Wire-Methode), value (Wert für Methode), text (Button-Text), confirmText (Bestätigungstext), variant, icon
Beispiel: <x-ui-confirm-button action="deleteTask" text="Löschen" confirmText="Wirklich löschen?" />
--}}

@props([
    'action' => '',
    'value' => null,
    'text' => 'Löschen',
    'confirmText' => 'Wirklich löschen?',
    'variant' => 'danger',
    'size' => 'md',
    'icon' => null,
    'class' => '',
])

@php
    $buttonVariant = match($variant) {
        'danger' => 'danger',
        'warning' => 'warning',
        'primary' => 'primary',
        'secondary' => 'secondary',
        default => 'danger'
    };
@endphp

<x-ui-button
    :variant="$buttonVariant"
    :size="$size"
    :class="'hover:bg-danger-80 hover:text-on-danger w-full d-flex '.$class"
    x-data="{ confirm: false }"
    x-on:click="
        if (!confirm) {
            confirm = true;
            $el.innerHTML = '{{ $confirmText }}';
            setTimeout(() => { confirm = false; $el.innerHTML = '{{ $text }}'; }, 3000);
        } else {
            $wire.call('{{ $action }}'{{ $value ? ', ' . $value : '' }});
        }
    "
>
    <div class="d-flex gap-2 items-center">
        @if($icon)
            @if(is_string($icon))
                {!! $icon !!}
            @else
                <x-dynamic-component :component="$icon" class="w-4 h-4" />
            @endif
        @endif
        <span>{{ $text }}</span>
    </div>
</x-ui-button>
