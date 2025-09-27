{{--
Form Grid Molecule
Zweck: 2-spaltiges Grid-Layout für Formulare
Props: cols (Anzahl Spalten), gap (Abstand zwischen Spalten)
Beispiel: <x-ui-form-grid :cols="2" gap="3">
--}}

@props([
    'cols' => 2,
    'gap' => 3,
])

@php
    $gridCols = match($cols) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-2', 
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        default => 'grid-cols-2'
    };
    
    $gapClass = match($gap) {
        1 => 'gap-1',
        2 => 'gap-2',
        3 => 'gap-3',
        4 => 'gap-4',
        6 => 'gap-6',
        default => 'gap-3'
    };
@endphp

<div class="grid {{ $gridCols }} {{ $gapClass }}">
    {{ $slot }}
</div>
