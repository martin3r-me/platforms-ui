{{--
Task Preview Card Component (Molecule)

Zweck: Statische Task-Preview-Karte für Kanban-Boards ohne Livewire-Abhängigkeit
Props:
- task: Task-Model
- title: string (optional, default: 'AUFGABE')
- href: string (optional)
- timestamp: string (optional)
- showStoryPoints: boolean (optional, default: true)
- showPriority: boolean (optional, default: true)
- showFrog: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-preview-card 
    :task="$task" 
    title="AUFGABE"
    href="/tasks/1"
    timestamp="17.07.2025"
/>
--}}

<x-ui-task-card 
    :task="$task"
    :title="$title ?? 'AUFGABE'"
    :href="$href ?? $taskRoute ?? '#'"
    :timestamp="$timestamp ?? ($task->updated_at ? $task->updated_at->format('d.m.Y') : '')"
    :showStoryPoints="$showStoryPoints ?? true"
    :showPriority="$showPriority ?? true"
    :showFrog="$showFrog ?? true"
/>
