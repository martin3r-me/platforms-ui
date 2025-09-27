{{--
Task Navigation Component (Molecule)

Zweck: Navigation-Buttons für Task-Detailansicht
Props:
- task: Task-Model
- projectRoute: string (optional)
- myTasksRoute: string (optional)

Beispiel:
<x-ui::components.molecules.task-navigation 
    :task="$task" 
    projectRoute="#"
    myTasksRoute="#"
/>
--}}

<div class="d-flex flex-col gap-2 mb-4">
    @if($task->project)
        @can('view', $task->project)
            <x-ui-button 
                variant="secondary" 
                size="md" 
                :href="$projectRoute ? route($projectRoute, $task->project) : '#'" 
                wire:navigate
                class="w-full d-flex"
            >
                <div class="d-flex items-center gap-2">
                    @svg('heroicon-o-arrow-left', 'w-4 h-4')
                    Projekt: {{ $task->project?->name }}
                </div>
            </x-ui-button>
        @else
            <x-ui-button 
                variant="secondary" 
                size="md" 
                disabled="true"
                title="Kein Zugriff auf das Projekt"
                class="w-full d-flex"
            >
                <div class="d-flex items-center gap-2">
                    @svg('heroicon-o-arrow-left', 'w-4 h-4')
                    Projekt: {{ $task->project?->name }}
                </div>
            </x-ui-button>
        @endcan
    @endif
    <x-ui-button 
        variant="secondary" 
        size="md" 
        :href="$myTasksRoute ? route($myTasksRoute) : '#'" 
        wire:navigate
        class="w-full d-flex"
    >
        <div class="d-flex items-center gap-2">
            @svg('heroicon-o-arrow-left', 'w-4 h-4')
            Meine Aufgaben
        </div>
    </x-ui-button>
</div>
