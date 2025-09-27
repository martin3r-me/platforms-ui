{{--
Task Sidebar Component (Organism)

Zweck: Sidebar für Task-Detailansicht mit Navigation, Einstellungen und Lösch-Buttons
Props:
- task: Task-Model
- canUpdate: boolean (optional, default: true)
- canDelete: boolean (optional, default: true)
- projectRoute: string (optional)
- myTasksRoute: string (optional)
- priorityOptions: array (optional)
- storyPointsOptions: array (optional)

Beispiel:
<x-ui::components.organisms.task-sidebar 
    :task="$task" 
    :canUpdate="true"
    :canDelete="true"
/>
--}}

<div class="min-w-80 w-80 d-flex flex-col border-left-1 border-left-solid border-left-muted">
    <div class="d-flex gap-2 border-top-1 border-bottom-1 border-muted border-top-solid border-bottom-solid p-2 flex-shrink-0">
        <x-heroicon-o-cog-6-tooth class="w-6 h-6"/>
        Einstellungen
    </div>
    <div class="flex-grow-1 overflow-y-auto p-4">
        {{-- Navigation Buttons --}}
        <x-ui-task-navigation 
            :task="$task" 
            :projectRoute="$projectRoute ?? '#'"
            :myTasksRoute="$myTasksRoute ?? '#'"
        />
        
        {{-- Task Actions --}}
        <x-ui-task-actions 
            :task="$task" 
            :canUpdate="$canUpdate ?? true"
        />

        {{-- Task Properties --}}
        <x-ui-task-properties 
            :task="$task" 
            :canUpdate="$canUpdate ?? true"
            :priorityOptions="$priorityOptions"
            :storyPointsOptions="$storyPointsOptions"
        />

        <hr>

        {{-- Delete Actions --}}
        <x-ui-task-delete-actions 
            :task="$task" 
            :canDelete="$canDelete ?? true"
        />
    </div>
</div>
