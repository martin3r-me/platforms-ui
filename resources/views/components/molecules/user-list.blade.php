{{--
User List Molecule
Zweck: Liste von Benutzern mit Rollen und Aktionen
Props: users, project, canUpdate, roles, onRemoveUser
Beispiel: <x-ui-user-list :users="$teamUsers" :project="$project" :canUpdate="true" />
--}}

@props([
    'users' => [],
    'project' => null,
    'canUpdate' => false,
    'roles' => [],
    'onRemoveUser' => 'removeProjectUser',
    'ownerRoleValue' => 'owner',
])

<div>
    <label class="block text-sm font-medium text-slate-700 mb-2">Projekt-Mitglieder & Rollen</label>
    <div class="space-y-2">
        @foreach ($users as $user)
            @php
                $projectUser = $project->projectUsers->firstWhere('user_id', $user->id);
                $role = $projectUser?->role ?? null;
                $isOwner = $role === $ownerRoleValue;
                $isAssigned = !is_null($role);
            @endphp

            <div class="flex items-center gap-2 p-2 rounded @if($isOwner) bg-primary-10 @endif">
                <x-heroicon-o-user class="w-4 h-4"/>
                <span class="text-sm font-medium">
                    {{ $user->fullname ?? $user->name }} ({{ $user->email }})
                </span>

                @if ($isOwner)
                    <span class="ml-2 px-2 py-1 rounded bg-primary text-white text-xs">Owner</span>
                @else
                    @if($canUpdate)
                        <x-ui-role-select
                            :userId="$user->id"
                            :currentRole="$role"
                            :roles="$roles"
                        />
                    @else
                        @if ($isAssigned)
                            <span class="ml-2 px-2 py-1 rounded bg-slate-200 text-xs">
                                {{ ucfirst($role) }}
                            </span>
                        @endif
                    @endif
                @endif

                {{-- Entfernen-Button (falls nicht Owner und beteiligt) --}}
                @if($canUpdate && !$isOwner && $isAssigned)
                    <button wire:click="{{ $onRemoveUser }}({{ $user->id }})" class="ml-2 text-red-500 hover:text-red-700" title="Entfernen">
                        <x-heroicon-o-x-mark class="w-4 h-4"/>
                    </button>
                @endif
            </div>
        @endforeach
    </div>
</div>
