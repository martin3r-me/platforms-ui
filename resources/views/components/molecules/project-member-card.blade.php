{{--
Project Member Card Molecule
Zweck: Karte für Projekt-Mitglieder mit Rollen und Aktionen
Props: user, project, canUpdate, roles, onRemoveUser
Beispiel: <x-ui-project-member-card :user="$user" :project="$project" :canUpdate="true" />
--}}

@props([
    'user' => null,
    'project' => null,
    'canUpdate' => false,
    'roles' => [],
    'onRemoveUser' => 'removeProjectUser',
    'ownerRoleValue' => 'owner',
])

@php
    $projectUser = $project->projectUsers->firstWhere('user_id', $user->id);
    $role = $projectUser?->role ?? null;
    $isOwner = $role === $ownerRoleValue;
    $isAssigned = !is_null($role);
@endphp

<div class="bg-white border border-muted rounded-lg p-4 shadow-sm transition hover:shadow-md @if($isOwner) border-primary @endif">
    <div class="d-flex items-center gap-3 mb-3">
        <x-ui-avatar :src="$user->profile_photo_url" :name="$user->fullname ?? $user->name" size="md" />
        <div class="flex-1 min-w-0">
            <h4 class="font-medium text-secondary truncate pb-0 mb-0">{{ $user->fullname ?? $user->name }}</h4>
            <p class="text-sm text-body truncate mb-0">{{ $user->email }}</p>
        </div>
        
        @if ($isOwner)
            <span class="px-2 py-1 rounded bg-primary text-white text-xs">Owner</span>
        @else
            @if($canUpdate)
                <x-ui-role-select
                    :userId="$user->id"
                    :currentRole="$role"
                    :roles="$roles"
                />
            @else
                @if ($isAssigned)
                    <span class="px-2 py-1 rounded bg-slate-200 text-xs">
                        {{ ucfirst($role) }}
                    </span>
                @endif
            @endif
        @endif
    </div>

    {{-- Entfernen-Button (falls nicht Owner und beteiligt) --}}
    @if($canUpdate && !$isOwner && $isAssigned)
        <div class="d-flex justify-end">
            <button wire:click="{{ $onRemoveUser }}({{ $user->id }})" class="text-red-500 hover:text-red-700 text-sm" title="Entfernen">
                <x-heroicon-o-x-mark class="w-4 h-4"/>
                Entfernen
            </button>
        </div>
    @endif
</div>
