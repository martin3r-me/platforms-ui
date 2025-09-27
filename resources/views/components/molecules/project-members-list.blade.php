{{--
Project Members List Molecule
Zweck: Rasterliste von Projekt-Mitgliedern mit Rollen und Aktionen
Props: users, project, canUpdate, roles, onRemoveUser
Beispiel: <x-ui-project-members-list :users="$teamUsers" :project="$project" :canUpdate="true" />
--}}

@props([
    'users' => [],
    'project' => null,
    'canUpdate' => false,
    'roles' => [],
    'onRemoveUser' => 'removeProjectUser',
])

<div>
    <label class="block text-sm font-medium text-slate-700 mb-4">Projekt-Mitglieder & Rollen</label>
    
    @if(count($users) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($users as $user)
                <x-ui-project-member-card
                    :user="$user"
                    :project="$project"
                    :canUpdate="$canUpdate"
                    :roles="$roles"
                    :onRemoveUser="$onRemoveUser"
                />
            @endforeach
        </div>
    @else
        <x-ui-empty-state icon="heroicon-o-users" title="Keine Projekt-Mitglieder" message="Es sind noch keine Projekt-Mitglieder vorhanden." />
    @endif
</div>
