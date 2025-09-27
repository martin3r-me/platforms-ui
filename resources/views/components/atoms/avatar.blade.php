{{--
  Component: Avatar (Atom)
  Zweck: Anzeige eines Nutzeravatars als Bild oder Initialen.
  Props:
    - src: string|null – Bildquelle, optional
    - name: string – Name zur Generierung der Initialen
    - size: 'sm'|'md'|'lg' – Größe des Avatars
    - rounded: 'full'|'lg'|'md' – Rundung des Avatars
--}}

@props([
    'src' => null,
    'name' => '',
    'size' => 'md', // sm, md, lg
    'rounded' => 'full', // full, lg, md
])

@php
    $sizes = [
        'sm' => ['w' => 'w-8', 'h' => 'h-8', 'text' => 'text-xs'],
        'md' => ['w' => 'w-10', 'h' => 'h-10', 'text' => 'text-sm'],
        'lg' => ['w' => 'w-12', 'h' => 'h-12', 'text' => 'text-base'],
    ];
    $s = $sizes[$size] ?? $sizes['md'];
    $radius = match($rounded) {
        'lg' => 'rounded-lg',
        'md' => 'rounded-md',
        default => 'rounded-full',
    };
    $initials = trim($name) !== '' ? mb_strtoupper(mb_substr($name, 0, 2)) : '';
@endphp

@if($src)
    <img src="{{ $src }}" alt="{{ $name }}" class="{{ $s['w'] }} {{ $s['h'] }} {{ $radius }} object-cover" />
@else
    <div class="{{ $s['w'] }} {{ $s['h'] }} bg-primary text-on-primary {{ $radius }} d-flex items-center justify-center">
        <span class="font-medium {{ $s['text'] }}">{{ $initials }}</span>
    </div>
@endif


