{{-- resources/views/components/ui/confirm-button.blade.php --}}
@props([
    'action' => '', // Wire-Methode, z. B. deleteTask
    'text' => 'Löschen',
    'confirmText' => 'Wirklich löschen?',
    'class' => '',
    'variant' => 'muted',
])

<x-ui-button
    :variant="$variant"
    :class="'hover:bg-danger-80 hover:text-on-danger text-xs w-full '.$class"
    x-data="{ confirm: false }"
    x-on:click="
        if (!confirm) {
            confirm = true;
            $el.innerText = '{{ $confirmText }}';
            setTimeout(() => { confirm = false; $el.innerText = '{{ $text }}'; }, 3000);
        } else {
            $wire.call('{{ $action }}');
        }
    "
>
    {{ $text }}
</x-ui-button>