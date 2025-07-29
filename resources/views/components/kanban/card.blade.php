@props([
    'title' => 'Card-Titel',
    'footer' => null,
    'sortableId' => null,
    'href' => null,
])

@php
    $sortableAttributes = $sortableId
        ? [
            'wire:sortable-group.item' => $sortableId,
            'wire:sortable-group.handle' => true,
        ]
        : [];

    $classes = 'rounded-lg p-1 shadow-md bg-white border border-muted mb-1';
@endphp

<div
    {{ $attributes->merge(array_merge(['class' => $classes], $sortableAttributes)) }}
    @if($href)
        x-data
        @click="
            $refs.navlink.click()
        "
        style="cursor: pointer;"
    @endif
>
    <!-- Header (nie klickbar) -->
    <div class="px-2 py-1 d-flex">
        <h4 class="text-xs text-muted font-semibold m-0">{{ $title }}</h4>
    </div>

    <!-- Body -->
    <div class="px-2 text-sm">
        {{ $slot }}
    </div>

    @if($href)
        <!-- Unsichtbarer wire:navigate-Link -->
        <a
            x-ref="navlink"
            href="{{ $href }}"
            wire:navigate
            tabindex="-1"
            style="display: none"></a>
    @endif

    <!-- Footer (nie klickbar) -->
    @if($footer)
        <div class="px-2 d-flex justify-between items-center">
            {{ $footer }}
        </div>
    @endif
</div>