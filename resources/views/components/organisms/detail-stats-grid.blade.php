{{--
  Component: Detail Stats Grid (Organism)
  Zweck: Zweispaltiges Grid mit getrennten Slots für linke und rechte Spalte.
  Props:
    - cols: int – Spaltenanzahl (Standard 2)
    - gap: int – Abstand in Grid-Einheiten
  Slots:
    - left: Inhalt linke Spalte
    - right: Inhalt rechte Spalte
--}}

@props([
    'cols' => 2,
    'gap' => 6,
])

@php
    $gridCols = 'grid-cols-'.(int)$cols;
    $gapClass = 'gap-'.(int)$gap;
@endphp

<div class="grid {{ $gridCols }} {{ $gapClass }} mb-8">
    <div class="space-y-4">
        {{ $left ?? '' }}
    </div>
    <div class="space-y-4">
        {{ $right ?? '' }}
    </div>
</div>


