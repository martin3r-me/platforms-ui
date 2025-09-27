{{--
  Component: Info Banner (Molecule)
  Zweck: Hinweiskasten mit Icon, Titel und Nachricht in konfigurierbaren Varianten.
  Props:
    - icon: string|null – Icon-Key für @svg
    - title: string – Überschrift
    - message: string – Beschreibungstext
    - variant: 'info'|'success'|'warning'|'danger'|'neutral' – Farbschema
--}}

@props([
    'icon' => null,
    'title' => '',
    'message' => '',
    'variant' => 'info', // info, success, warning, danger, neutral
])

@php
    $bg = "bg-{$variant}-5";
    $border = "border border-{$variant}-20";
    $titleText = "text-{$variant}-80";
@endphp

<div class="{{ $bg }} {{ $border }} rounded-lg p-4">
    <div class="d-flex items-center gap-2 mb-2">
        @if($icon)
            @svg($icon, 'w-5 h-5 text-'.$variant)
        @endif
        <h3 class="text-lg font-semibold {{ $titleText }} leading-tight">{{ $title }}</h3>
    </div>
    @if($message)
        <p class="text-{{ $variant }} text-sm mt-0.5">{{ $message }}</p>
    @endif
</div>


