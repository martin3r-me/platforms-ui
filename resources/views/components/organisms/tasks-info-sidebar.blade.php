{{--
  Component: Tasks Info Sidebar (Organism)
  Zweck: Sidebar für Aufgaben-Übersicht mit Statistiken, Aktionen und erledigten Aufgaben.
  Props:
    - title: string - Titel der Sidebar
    - subtitle: string - Untertitel
    - stats: array - Array mit Statistiken für Dashboard-Tiles
    - completedTasks: Collection - Erledigte Aufgaben
    - actions: array - Array mit Aktions-Buttons
--}}

@props([
    'title' => 'Meine Aufgaben',
    'subtitle' => 'Persönliche Aufgaben und zuständige Projektaufgaben',
    'stats' => [],
    'completedTasks' => collect([]),
    'actions' => [],
])

<div class="w-80 border-r border-muted p-4 flex-shrink-0">
    <!-- Dashboard-Info -->
    <div class="mb-6">
        <h3 class="text-lg uppercase font-semibold mb-2 text-secondary">{{ $title }}</h3>
        <div class="text-sm text-body mb-4">{{ $subtitle }}</div>
        
        <!-- Statistiken mit Dashboard-Tiles in 2-spaltigem Grid -->
        @if(!empty($stats))
            <div class="grid grid-cols-2 gap-2 mb-4">
                @foreach($stats as $stat)
                    <x-ui-dashboard-tile
                        :title="$stat['title']"
                        :count="$stat['count']"
                        :icon="$stat['icon']"
                        :variant="$stat['variant']"
                        size="sm"
                    />
                @endforeach
            </div>
        @endif

        <!-- Aktionen -->
        @if(!empty($actions))
            <div class="d-flex flex-col gap-2 mb-4">
                @foreach($actions as $action)
                    @if(isset($action['onclick']))
                        <x-ui-button 
                            :variant="$action['variant']" 
                            :size="$action['size']"
                            @click="{{ $action['onclick'] }}"
                        >
                            {{ $action['label'] }}
                        </x-ui-button>
                    @else
                        <x-ui-button 
                            :variant="$action['variant']" 
                            :size="$action['size']" 
                            :wire:click="$action['wire_click'] ?? null"
                            :href="$action['href'] ?? null"
                        >
                            {{ $action['label'] }}
                        </x-ui-button>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <!-- Erledigte Aufgaben -->
    <x-ui-completed-tasks-list :completed-tasks="$completedTasks" />
</div>