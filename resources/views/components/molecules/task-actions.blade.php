{{--
Task Actions Component (Molecule)

Zweck: Action-Buttons und Checkboxen für Task-Status
Props:
- task: Task-Model
- canUpdate: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-actions 
    :task="$task" 
    :canUpdate="true"
/>
--}}

<div class="d-flex flex-col gap-2 mb-4">
    {{-- Erledigt-Checkbox --}}
    @if($canUpdate ?? true)
        <x-ui-checkbox
            model="task.is_done"
            checked-label="Erledigt"
            unchecked-label="Als erledigt markieren"
            size="md"
            block="true"
            variant="success"
            :icon="@svg('heroicon-o-check-circle', 'w-4 h-4')->toHtml()"
        />
    @else
        <x-ui-status-badge 
            :status="$task->is_done ? 'completed' : 'pending'"
            :label="$task->is_done ? 'Erledigt' : 'Offen'"
            icon="heroicon-o-check-circle"
        />
    @endif

    {{-- Frosch-Checkbox --}}
    @if($canUpdate ?? true)
        <x-ui-checkbox
            model="task.is_frog"
            checked-label="Ist ein Frosch"
            unchecked-label="Sei ein Frosch"
            size="md"
            block="true"
            variant="warning"
            :icon="@svg('heroicon-o-exclamation-triangle', 'w-4 h-4')->toHtml()"
        />
    @else
        <x-ui-status-badge 
            :status="$task->is_frog ? 'frog' : 'normal'"
            :label="$task->is_frog ? 'Frosch-Aufgabe' : 'Normale Aufgabe'"
            icon="heroicon-o-exclamation-triangle"
        />
    @endif
</div>
