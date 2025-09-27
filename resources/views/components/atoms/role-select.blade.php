{{--
Role Select Atom
Zweck: Select-Element für Benutzerrollen
Props: userId, currentRole, roles, excludeOwner
Beispiel: <x-ui-role-select :userId="$user->id" :currentRole="$role" :roles="$roles" />
--}}

@props([
    'userId' => null,
    'currentRole' => null,
    'roles' => [],
    'excludeOwner' => true,
    'ownerRoleValue' => 'owner',
    'minWidth' => '90px',
])

<select wire:model="roles.{{ $userId }}" class="border rounded px-2 py-1 text-xs ml-2" style="min-width: {{ $minWidth }};">
    <option value="">– Nicht beteiligt –</option>
    @foreach($roles as $enumRole)
        @if(!$excludeOwner || $enumRole->value !== $ownerRoleValue)
            <option value="{{ $enumRole->value }}">{{ ucfirst($enumRole->value) }}</option>
        @endif
    @endforeach
</select>
