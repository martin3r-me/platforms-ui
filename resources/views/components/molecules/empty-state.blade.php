{{--
  Component: Empty State (Molecule)
  Zweck: Einheitliche Anzeige für leere Listen/Zustände.
  Props:
    - icon: string|null – Icon-Key für @svg
    - title: string – Überschrift
    - message: string – Beschreibungstext
--}}

@props([
    'icon' => null,
    'title' => '',
    'message' => '',
])

<div class="text-center py-8">
    @if($icon)
        @svg($icon, 'w-12 h-12 text-muted mx-auto mb-4')
    @endif
    @if($title)
        <h4 class="text-lg font-medium text-secondary mb-2">{{ $title }}</h4>
    @endif
    @if($message)
        <p class="text-body">{{ $message }}</p>
    @endif
    {{ $slot ?? '' }}
}</div>


