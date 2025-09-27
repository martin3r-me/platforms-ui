{{--
  Component: Collapsible Section (Atom)
  Zweck: Einklappbarer Bereich mit Toggle-Button.
  Props:
    - title: string - Titel des Bereichs
    - count: int|null - Optional: Anzahl für Badge
  Beispiel:
    <x-ui-collapsible-section title="Aktivitäten" :count="5">
        <p>Inhalt hier...</p>
    </x-ui-collapsible-section>
--}}

@props([
    'title' => 'Bereich',
    'count' => null
])

<div x-data="{ open: false }" class="flex-shrink-0 border-t border-muted">
    <div 
        @click="open = !open" 
        class="cursor-pointer border-top-1 border-top-solid border-top-muted border-bottom-1 border-bottom-solid border-bottom-muted p-2 text-center d-flex items-center justify-center gap-1 mx-2 shadow-lg"
    >
        {{ $title }}
        @if($count !== null)
            <span class="text-xs">{{ $count }}</span>
        @endif
        <x-heroicon-o-chevron-double-down 
            class="w-3 h-3" 
            x-show="!open"
        />
        <x-heroicon-o-chevron-double-up 
            class="w-3 h-3" 
            x-show="open"
        />
    </div>
    <div x-show="open" class="p-2 max-h-xs overflow-y-auto">
        {{ $slot }}
    </div>
</div>
