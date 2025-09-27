{{--
  Component: Tasks Kanban Container (Organism)
  Zweck: Container für das Kanban-Board mit Sortier-Funktionalität.
  Props:
    - groups: Collection - Task-Gruppen
    - sortableGroupOrder: string - Wire-Methode für Gruppen-Sortierung
    - sortableTaskOrder: string - Wire-Methode für Task-Sortierung
--}}

@props([
    'groups' => collect([]),
    'sortableGroupOrder' => 'updateTaskGroupOrder',
    'sortableTaskOrder' => 'updateTaskOrder',
    'settingsModalEvent' => 'open-modal-task-group-settings',
    'settingsModalParam' => 'taskGroupId',
    'taskRoute' => '#',
])

<div class="flex-grow overflow-x-auto">
    <x-ui-kanban-board 
        :wire:sortable="$sortableGroupOrder" 
        :wire:sortable-group="$sortableTaskOrder"
    >
        <!-- Erste Spalte (Backlog/Inbox) -->
        @if($groups->isNotEmpty())
            @php 
                $firstGroup = $groups->first();
                // Bestimme den Titel basierend auf den Properties
                $title = 'BACKLOG'; // Default
                if (isset($firstGroup->isInbox) && $firstGroup->isInbox) {
                    $title = 'INBOX';
                } elseif (isset($firstGroup->isBacklog) && $firstGroup->isBacklog) {
                    $title = 'BACKLOG';
                } elseif (isset($firstGroup->label)) {
                    $title = $firstGroup->label;
                }
            @endphp
            <x-ui-kanban-column :title="$title">
                @foreach ($firstGroup->tasks as $task)
                    <x-ui-task-preview-card 
                        :task="$task"
                        :taskRoute="$taskRoute !== '#' ? route($taskRoute, $task) : '#'"
                        wire:key="task-preview-{{ $task->uuid }}"
                    />
                @endforeach
            </x-ui-kanban-column>
        @endif

        <!-- Weitere Spalten -->
        @foreach($groups->filter(function($g) {
            // Prüfe verschiedene mögliche Properties für Backlog/Inbox
            $isBacklog = isset($g->isBacklog) ? $g->isBacklog : false;
            $isInbox = isset($g->isInbox) ? $g->isInbox : false;
            $isDoneGroup = $g->isDoneGroup ?? false;
            
            // Filtere alle aus, die Backlog/Inbox oder Done sind
            return !($isBacklog || $isInbox || $isDoneGroup);
        }) as $column)
            <x-ui-kanban-column
                :title="$column->label"
                :sortable-id="$column->id"
            >
                <x-slot name="extra">
                    <div class="d-flex gap-1">
                        <x-ui-button 
                            variant="success" 
                            size="sm" 
                            class="w-full" 
                            wire:click="createTask('{{$column->id}}')"
                        >
                            + Neue Aufgabe
                        </x-ui-button>
                        <x-ui-button 
                            variant="primary" 
                            size="sm" 
                            class="w-full" 
                            @click="$dispatch('{{ $settingsModalEvent }}', { {{ $settingsModalParam }}: {{ $column->id }} })"
                        >
                            Settings
                        </x-ui-button>
                    </div>
                </x-slot>

                @foreach($column->tasks as $task)
                    <x-ui-task-preview-card 
                        :task="$task"
                        :taskRoute="$taskRoute !== '#' ? route($taskRoute, $task) : '#'"
                        wire:key="task-preview-{{ $task->uuid }}"
                    />
                @endforeach
            </x-ui-kanban-column>
        @endforeach
    </x-ui-kanban-board>
</div>