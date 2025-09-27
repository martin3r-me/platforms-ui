{{--
  Component: Action Buttons (Molecule)
  Zweck: Vertikale Liste von Aktions-Buttons.
  Props:
    - actions: array – Array mit Button-Konfigurationen
    - canUpdate: bool – Berechtigung für Update-Aktionen
--}}

@props([
    'actions' => [],
    'canUpdate' => false,
])

@if($canUpdate && !empty($actions))
    <div class="d-flex flex-col gap-2 mb-4">
        @foreach($actions as $action)
            <x-ui-button 
                :variant="$action['variant']" 
                :size="$action['size']" 
                :wire:click="$action['wire_click'] ?? null"
                :href="$action['href'] ?? null"
            >
                {{ $action['label'] }}
            </x-ui-button>
        @endforeach
    </div>
@endif
