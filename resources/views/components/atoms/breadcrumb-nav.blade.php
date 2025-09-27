{{--
  Component: Breadcrumb Navigation (Atom)
  Zweck: Einfache Navigation mit Links.
  Props:
    - items: array - Array mit Navigation-Items
  Beispiel:
    <x-ui-breadcrumb-nav :items="[
        ['label' => 'Projekt', 'href' => '/project'],
        ['label' => 'Task', 'current' => true]
    ]" />
--}}

@props([
    'items' => []
])

@php
    // Filter out null items and ensure we have a valid array
    $filteredItems = collect($items)->filter()->values()->toArray();
@endphp

<nav class="d-flex gap-1 items-center">
    @foreach($filteredItems as $index => $item)
        @if($index > 0)
            <span class="text-muted mx-1">></span>
        @endif
        
        @if(isset($item['current']) && $item['current'])
            <span class="text-body font-medium">{{ $item['label'] }}</span>
        @elseif(isset($item['href']) && $item['href'])
            <a href="{{ $item['href'] }}" class="underline hover:text-primary" wire:navigate>
                {{ $item['label'] }}
            </a>
        @else
            <span class="text-muted">{{ $item['label'] }}</span>
        @endif
    @endforeach
</nav>
