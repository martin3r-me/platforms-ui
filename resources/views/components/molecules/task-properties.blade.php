{{--
Task Properties Component (Molecule)

Zweck: Eigenschaften-Bereich für Task (Priorität, Story Points, Verantwortlich)
Props:
- task: Task-Model
- canUpdate: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-properties 
    :task="$task" 
    :canUpdate="true"
/>
--}}

{{-- Priorität --}}
@if($canUpdate ?? true)
    <x-ui-input-select
        name="task.priority"
        label="Priorität"
        :options="$priorityOptions"
        optionValue="value"
        optionLabel="label"
        :nullable="false"
        wire:model.live="task.priority"
    />
@else
    <div>
        <label class="font-semibold">Priorität:</label>
        <div>{{ $task->priority->label() ?? '–' }}</div>
    </div>
@endif

{{-- Story Points --}}
@if($canUpdate ?? true)
    <x-ui-input-select
        name="task.story_points"
        label="Story Points"
        :options="$storyPointsOptions"
        optionValue="value"
        optionLabel="label"
        :nullable="true"
        nullLabel="– Kein Wert –"
        wire:model.live="task.story_points"
    />
@else
    <div>
        <label class="font-semibold">Story Points:</label>
        <div>{{ $task->story_points?->label() ?? '–' }}</div>
    </div>
@endif

{{-- Verantwortlich (nur wenn Projekt und Projekt-User verfügbar) --}}
@if ($task?->project && $task?->project?->projectUsers)
    @if($canUpdate ?? true)
        <x-ui-input-select
            name="task.user_in_charge_id"
            label="Verantwortlich"
            :options="$task?->project?->projectUsers ?? []"
            optionValue="user.id"
            optionLabel="user.fullname"
            :nullable="true"
            nullLabel="– Keine Auswahl –"
            wire:model.live="task.user_in_charge_id"
        />
    @else
        <div>
            <label class="font-semibold">Verantwortlich:</label>
            <div>
                {{
                    optional(
                        collect($task->project->projectUsers ?? [])
                            ->firstWhere('user.id', $task->user_in_charge_id)
                    )['user']['fullname'] ?? '–'
                }}
            </div>
        </div>
    @endif
@endif
