{{--
  Component: Stats Grid (Organism)
  Zweck: Grid-Container für Kennzahlen-Kacheln.
  Props:
    - cols: int – Spaltenanzahl
    - gap: int – Abstand in Grid-Einheiten
  Slots:
    - default: Kachel-Items
--}}

@props([
    'cols' => 4,
    'gap' => 4,
])

@php
    $gridCols = 'grid-cols-'.(int)$cols;
    $gapClass = 'gap-'.(int)$gap;
@endphp

<div class="grid {{ $gridCols }} {{ $gapClass }} mb-8">
    {{ $slot }}
</div>


