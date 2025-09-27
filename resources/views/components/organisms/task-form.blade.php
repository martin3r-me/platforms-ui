{{--
Task Form Component (Organism)

Zweck: Formular-Bereich für Task-Detailansicht mit Titel und Beschreibung
Props:
- task: Task-Model
- canUpdate: boolean (optional, default: true)

Beispiel:
<x-ui::components.organisms.task-form 
    :task="$task" 
    :canUpdate="true"
/>
--}}

<div class="form-group">
    <!-- Titel -->
    @if($canUpdate ?? true)
        <x-ui-input-text 
            name="task.title"
            label="Task-Titel"
            wire:model.live.debounce.500ms="task.title"
            placeholder="Task-Titel eingeben..."
            required
            :errorKey="'task.title'"
        />
    @else
        <div>
            <label class="font-semibold">Task-Titel:</label>
            <div>{{ $task->title }}</div>
        </div>
    @endif
</div>

<div class="form-group">
    <!-- Beschreibung -->
    @if($canUpdate ?? true)
        <x-ui-input-textarea 
            name="task.description"
            label="Aufgaben Beschreibung"
            wire:model.live.debounce.500ms="task.description"
            placeholder="Aufgaben Beschreibung eingeben..."
            :errorKey="'task.description'"
        />
    @else
        <div>
            <label class="font-semibold">Beschreibung:</label>
            <div>{{ $task->description }}</div>
        </div>
    @endif
</div>
