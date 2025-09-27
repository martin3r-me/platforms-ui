{{--
  Component: Panel (Atom)
  Zweck: Standardisierter Karten-/Containerrahmen mit optionalem Header und Footer.
  Props:
    - variant: 'surface'|'white' – Hintergrundvariante
    - padding: 'sm'|'md'|'lg' – Innenabstand
    - title: string|null – Überschrift im Header
    - subtitle: string|null – Untertitel im Header
--}}

@props([
    'variant' => 'surface', // surface, white
    'padding' => 'md', // sm, md, lg
    'title' => null,
    'subtitle' => null,
])

@php
    $bg = $variant === 'white' ? 'bg-white' : 'bg-surface';
    $pad = match($padding) {
        'sm' => 'p-4',
        'lg' => 'p-8',
        default => 'p-6',
    };
    $container = implode(' ', [
        $bg,
        'rounded-lg shadow-sm border border-muted',
    ]);
@endphp

<div {{ $attributes->merge(['class' => $container]) }}>
    @if($title || $subtitle)
        <div class="p-6 border-b border-muted">
            @if($title)
                <h3 class="text-lg font-semibold text-secondary leading-tight">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="text-sm text-body mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    <div class="{{ $pad }}">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="p-4 border-t border-muted d-flex justify-end gap-2">
            {{ $footer }}
        </div>
    @endisset
</div>


