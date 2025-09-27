{{--
  Component: Completed Tasks List (Molecule)
  Zweck: Liste erledigter Aufgaben mit Scroll und "Weitere"-Anzeige.
  Props:
    - completedTasks: Collection – Erledigte Tasks
    - maxItems: int – Maximale Anzahl anzuzeigender Items
--}}

@props([
    'completedTasks' => collect([]),
    'maxItems' => 10,
    'taskRoute' => '#',
])

@if($completedTasks->count() > 0)
    <div>
        <h4 class="font-medium mb-3 text-secondary">Erledigte Aufgaben ({{ $completedTasks->count() }})</h4>
        <div class="space-y-1 max-h-60 overflow-y-auto">
            @foreach($completedTasks->take($maxItems) as $task)
                <x-ui-completed-task-item 
                    :task="$task" 
                    :href="$taskRoute" 
                />
            @endforeach
            @if($completedTasks->count() > $maxItems)
                <div class="text-xs text-muted italic text-center">
                    +{{ $completedTasks->count() - $maxItems }} weitere
                </div>
            @endif
        </div>
    </div>
@else
    <div class="text-sm text-muted italic">Noch keine erledigten Aufgaben</div>
@endif
