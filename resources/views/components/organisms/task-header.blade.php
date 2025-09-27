{{--
Task Header Component (Organism)

Zweck: Header-Bereich für Task-Detailansicht mit Breadcrumb, Titel und Druck-Button
Props:
- task: Task-Model
- printingAvailable: boolean (optional)
- breadcrumbItems: array (optional)

Beispiel:
<x-ui::components.organisms.task-header 
    :task="$task" 
    :printingAvailable="true"
    :breadcrumbItems="[...]"
/>
--}}

<div class="border-top-1 border-bottom-1 border-muted border-top-solid border-bottom-solid p-2 flex-shrink-0">
    <div class="d-flex gap-1">
        <x-ui-breadcrumb-nav :items="$breadcrumbItems" />
        <div class="flex-grow-1 text-right d-flex items-center justify-end gap-2">
            <span>{{ $task->title }}</span>
            @if($printingAvailable ?? true)
                <x-ui-button 
                    variant="secondary" 
                    size="sm"
                    wire:click="$dispatch('openPrintModal')"
                    title="Task drucken"
                >
                    <div class="d-flex items-center gap-2">
                        @svg('heroicon-o-printer', 'w-4 h-4')
                        Drucken
                    </div>
                </x-ui-button>
            @endif
        </div>
    </div>
</div>
