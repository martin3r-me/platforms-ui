{{--
Task Badges Component (Molecule)

Zweck: Badge-Container für Task-Eigenschaften (Story Points, Priorität, Frosch)
Props:
- task: Task-Model
- showStoryPoints: boolean (optional, default: true)
- showPriority: boolean (optional, default: true)
- showFrog: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-badges 
    :task="$task" 
    :showStoryPoints="true"
    :showPriority="true"
    :showFrog="true"
/>
--}}

<div class="d-flex gap-1">
    @if(($showStoryPoints ?? true) && $task->story_points)
        <x-ui-badge variant="secondary" size="xs">
            {{ $task->story_points->label() }}
        </x-ui-badge>
    @endif
    
    @if(($showPriority ?? true) && $task->priority)
        <x-ui-badge variant="secondary" size="xs">
            {{ $task->priority->label() }}
        </x-ui-badge>
    @endif
    
    @if(($showFrog ?? true) && $task->is_frog)
        <x-ui-badge variant="danger" size="xs">
            Frosch
        </x-ui-badge>
    @endif
</div>
