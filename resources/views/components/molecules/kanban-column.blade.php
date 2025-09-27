{{--
  Component: Kanban Column (Molecule)
  Zweck: Einzelne Spalte im Kanban-Board mit Sortier-Funktionalität.
  Props:
    - title: string - Spalten-Titel
    - sortableId: string|null - ID für Sortierung
    - scrollable: bool - Scrollbar aktivieren
    - footer: string|null - Footer-Inhalt
--}}

@props([
    'title' => 'Unbenannt',
    'sortableId' => null,
    'scrollable' => true,
    'footer' => null,
])

<div 
    @if($sortableId)
        wire:sortable.item="{{ $sortableId }}"
        wire:key="column-{{ $sortableId }}"
    @endif
    {{ $attributes->merge(['class' => 'flex-shrink-0 h-full w-80 flex flex-col']) }}
>
    <div class="d-flex flex-col h-full bg-muted-5">
        
        <!-- Header -->
        <div class="p-3 text-md font-mono font-bold uppercase tracking-wide d-flex justify-between items-center">
            {{ $title }}
            
            <!-- Drag-Handle für die ganze Spalte -->
            <button wire:sortable.handle class="text-primary cursor-grab" title="Spalte verschieben">
                <x-heroicon-o-bars-3 class="w-5 h-5" />
            </button>
        </div>

        <!-- Extra Slot (z. B. Buttons, Filter, Menü) -->
        @isset($extra)
            <div class="p-2 border-b border-muted bg-surface">
                {{ $extra }}
            </div>
        @endisset

        <!-- Body: Hier landen die Cards (sortable target) -->
        <div 
            wire:sortable-group.item-group="{{ $sortableId }}" 
            class="flex-grow px-3 py-3 gap-3 d-flex flex-col {{ $scrollable ? 'overflow-y-auto' : '' }}"
        >
            {{ $slot }}
        </div>

        <!-- Footer (optional) -->
        @if($footer)
            <div class="px-4 py-3 border-t border-muted bg-surface">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
