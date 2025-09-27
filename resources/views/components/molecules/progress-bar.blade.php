{{--
  Component: Progress Bar (Molecule)
  Zweck: Einfacher Fortschrittsbalken mit Prozentwert.
  Props:
    - value: int 0–100 – Fortschritt in Prozent
    - variant: string – Farbvariante (z. B. 'success')
    - height: 'xs'|'sm'|'md' – Höhe des Balkens
--}}

@props([
    'value' => 0, // 0-100
    'variant' => 'success',
    'height' => 'sm', // xs, sm, md
])

@php
    $h = match($height) {
        'xs' => 'h-1',
        'md' => 'h-3',
        default => 'h-2',
    };
@endphp

<div class="w-full bg-muted-20 rounded-full {{ $h }}">
    <div class="bg-{{ $variant }} {{ $h }} rounded-full" style="width: {{ max(0, min(100, (int)$value)) }}%"></div>
    </div>


