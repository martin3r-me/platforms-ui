{{--
Task Delete Actions Component (Molecule)

Zweck: Lösch-Buttons für Task
Props:
- task: Task-Model
- canDelete: boolean (optional, default: true)

Beispiel:
<x-ui::components.molecules.task-delete-actions 
    :task="$task" 
    :canDelete="true"
/>
--}}

@if($canDelete ?? true)
    <div class="mb-4">
        <h4 class="font-semibold mb-2">Löschen</h4>
        <div class="d-flex flex-col gap-2">
            <x-ui-confirm-button 
                action="deleteTaskAndReturnToDashboard" 
                text="Löschen (Meine Aufgaben)" 
                confirmText="Task wirklich löschen?" 
                variant="danger-outline"
                :icon="@svg('heroicon-o-trash', 'w-4 h-4')->toHtml()"
            />
            
            @if($task->project)
                <x-ui-confirm-button 
                    action="deleteTaskAndReturnToProject" 
                    text="Löschen (Projekt)" 
                    confirmText="Task wirklich löschen?" 
                    variant="danger-outline"
                    :icon="@svg('heroicon-o-trash', 'w-4 h-4')->toHtml()"
                />
            @endif
        </div>
    </div>
@endif
