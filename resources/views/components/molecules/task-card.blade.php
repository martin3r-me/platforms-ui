{{--
Task Card Component (Molecule)

Zweck: Hauptkarte für Task-Preview mit Titel, Beschreibung und Projekt
Props:
- task: Task-Model
- title: string (optional, default: 'AUFGABE')
- href: string (optional)
- timestamp: string (optional)
- showStoryPoints: boolean (optional, default: true)
- showPriority: boolean (optional, default: true)
- showFrog: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-card 
    :task="$task" 
    title="AUFGABE"
    href="/tasks/1"
    timestamp="17.07.2025"
/>
--}}

<x-ui-kanban-card 
    :sortable-id="$task->id" 
    :title="$title ?? 'AUFGABE'"
    :href="$href ?? $taskRoute ?? '#'"
>
    {{ $task->title }} 
    @if($task->project)
        <small class="text-secondary">| {{ $task->project?->name }}</small>
    @endif 
    <p class="text-xs text-muted">{{ $task->description }}</p>

    <x-slot name="footer">
        <span class="text-xs text-muted">
            Zuletzt bearbeitet: {{ $timestamp ?? '17.07.2025' }}
        </span>
        <x-ui-task-badges 
            :task="$task"
            :showStoryPoints="$showStoryPoints ?? true"
            :showPriority="$showPriority ?? true"
            :showFrog="$showFrog ?? true"
        />
    </x-slot>
</x-ui-kanban-card>
