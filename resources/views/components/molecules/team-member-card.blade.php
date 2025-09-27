{{--
  Component: Team Member Card (Molecule)
  Zweck: Kompakte Karte mit Nutzerinfos und Aufgaben/Story-Point-Kennzahlen.
  Props:
    - name: string
    - email: string
    - photoUrl: string|null
    - openTasks, totalTasks, completedTasks: int
    - openStoryPoints, totalStoryPoints, completedStoryPoints: int
--}}

@props([
    'name' => '',
    'email' => '',
    'photoUrl' => null,
    'openTasks' => 0,
    'totalTasks' => 0,
    'completedTasks' => 0,
    'openStoryPoints' => 0,
    'totalStoryPoints' => 0,
    'completedStoryPoints' => 0,
])

<div class="bg-white border border-muted rounded-lg p-4 shadow-sm transition hover:shadow-md">
    <div class="d-flex items-center gap-3 mb-3">
        <x-ui-avatar :src="$photoUrl" :name="$name" size="md" />
        <div class="flex-1 min-w-0">
            <h4 class="font-medium text-secondary truncate pb-0 mb-0">{{ $name }}</h4>
            <p class="text-sm text-body truncate mb-0">{{ $email }}</p>
        </div>
    </div>

    <div class="space-y-2">
        <div class="d-flex items-center justify-between">
            <span class="text-sm text-body">Aufgaben:</span>
            <div class="d-flex items-center gap-2">
                <span class="text-sm font-medium text-secondary">{{ $openTasks }}</span>
                <span class="text-xs text-muted">/ {{ $totalTasks }}</span>
                @if($completedTasks > 0)
                    <span class="text-xs text-success">✓{{ $completedTasks }}</span>
                @endif
            </div>
        </div>

        @if($totalStoryPoints > 0)
            <div class="d-flex items-center justify-between">
                <span class="text-sm text-body">Story Points:</span>
                <div class="d-flex items-center gap-2">
                    <span class="text-sm font-medium text-secondary">{{ $openStoryPoints }}</span>
                    <span class="text-xs text-muted">/ {{ $totalStoryPoints }}</span>
                    @if($completedStoryPoints > 0)
                        <span class="text-xs text-success">✓{{ $completedStoryPoints }}</span>
                    @endif
                </div>
            </div>
        @endif

        @if($totalTasks > 0)
            <x-ui-progress-bar :value="($completedTasks / max(1,$totalTasks)) * 100" variant="success" height="xs" />
        @endif
    </div>
</div>


