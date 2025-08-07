@props([
    'tabs' => [],
    'model' => null, // wire:model Binding
])

@php
    $modelBinding = $attributes->whereStartsWith('wire:model')->first();
    $modelName = $model ?? Str::after($modelBinding, 'wire:model=');
@endphp

<div class="inline-flex gap-2">
    @foreach($tabs as $tab)
        @php
            $isActive = $model && $model === $tab['value'];
        @endphp

        <x-ui-button
            wire:click="$set('{{ $modelName }}', '{{ $tab['value'] }}')"
            variant="{{ $isActive ? 'primary' : 'secondary-outline' }}"
            size="sm"
        >
            {{ $tab['label'] }}
        </x-ui-button>
    @endforeach
</div>