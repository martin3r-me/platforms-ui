{{--
  Component: Kanban Board (Organism)
  Zweck: Container für Kanban-Board mit Sortier-Funktionalität.
  Props:
    - wire:sortable: string - Wire-Methode für Spalten-Sortierung
    - wire:sortable-group: string - Wire-Methode für Karten-Sortierung
--}}

<div 
    {{ $attributes->only(['wire:sortable', 'wire:sortable-group'])->merge([
        'class' => 'h-full w-full d-flex gap-1 overflow-x-auto'
    ]) }}
>
    {{ $slot }}
</div>
