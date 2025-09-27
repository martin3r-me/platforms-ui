{{--
Task Layout Organism
Zweck: Two-Column Layout für Task-Details mit Header, Content, Activities und Sidebar
Props: task, printingAvailable, breadcrumbItems, canUpdate, canDelete, projectRoute, myTasksRoute, priorityOptions, storyPointsOptions
Beispiel: <x-ui-task-layout :task="$task" :printingAvailable="true" />
--}}

@props([
    'task' => null,
    'printingAvailable' => true,
    'breadcrumbItems' => [],
    'canUpdate' => false,
    'canDelete' => false,
    'projectRoute' => '#',
    'myTasksRoute' => '#',
    'priorityOptions' => [],
    'storyPointsOptions' => [],
])

<div class="d-flex h-full">
    <!-- Linke Spalte -->
    <div class="flex-grow-1 d-flex flex-col">
        <!-- Header oben (fix) -->
        <x-ui-task-header 
            :task="$task"
            :printingAvailable="$printingAvailable"
            :breadcrumbItems="$breadcrumbItems"
        />

        <!-- Haupt-Content (nimmt Restplatz, scrollt) -->
        <div class="flex-grow-1 overflow-y-auto p-4">
            <x-ui-task-form 
                :task="$task"
                :canUpdate="$canUpdate"
            />
        </div>

        <!-- Aktivitäten (immer unten) -->
        <div x-data="{ open: false }" class="flex-shrink-0 border-t border-muted">
            <div 
                @click="open = !open" 
                class="cursor-pointer border-top-1 border-top-solid border-top-muted border-bottom-1 border-bottom-solid border-bottom-muted p-2 text-center d-flex items-center justify-center gap-1 mx-2 shadow-lg"
            >
                AKTIVITÄTEN 
                <span class="text-xs">
                    {{$task->activities->count()}}
                </span>
                <x-heroicon-o-chevron-double-down 
                    class="w-3 h-3" 
                    x-show="!open"
                />
                <x-heroicon-o-chevron-double-up 
                    class="w-3 h-3" 
                    x-show="open"
                />
            </div>
            <div x-show="open" class="p-2 max-h-xs overflow-y-auto">
                <livewire:activity-log.index
                    :model="$task"
                    :key="get_class($task) . '_' . $task->id"
                />
            </div>
        </div>
    </div>

    <!-- Rechte Spalte -->
    <x-ui-task-sidebar 
        :task="$task"
        :canUpdate="$canUpdate"
        :canDelete="$canDelete"
        :projectRoute="$projectRoute"
        :myTasksRoute="$myTasksRoute"
        :priorityOptions="$priorityOptions"
        :storyPointsOptions="$storyPointsOptions"
    />

    <!-- Print Modal wird von der aufrufenden Komponente eingebunden -->
</div>
