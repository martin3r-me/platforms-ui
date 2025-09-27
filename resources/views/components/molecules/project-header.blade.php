{{--
  Component: Project Header (Molecule)
  Zweck: Projekt-Header mit Titel, Buttons, Kunden-Info und Beschreibung.
  Props:
    - projectName: string – Projektname
    - projectType: string|null – Projekttyp ('customer' oder null)
    - customerCompanyName: string|null – Kunden-Firmenname
    - description: string|null – Projektbeschreibung
    - projectId: int – Projekt-ID für Modals
--}}

@props([
    'projectName' => '',
    'projectType' => null,
    'customerCompanyName' => null,
    'description' => null,
    'projectId' => null,
])

<div class="mb-6">
    <div class="d-flex justify-between items-start">
        <h3 class="text-lg font-semibold text-secondary">{{ $projectName }}</h3>
    </div>
    
    <div class="d-flex items-center gap-2 mt-2">
        @if($projectType === 'customer')
            <x-ui-button variant="primary" size="sm" @click="$dispatch('open-modal-customer-project', { projectId: {{ $projectId }} })">
                <div class="d-flex items-center gap-2">
                    @svg('heroicon-o-user-group', 'w-4 h-4')
                    Kunden
                </div>
            </x-ui-button>
        @endif
        <x-ui-button variant="info" size="sm" @click="$dispatch('open-modal-project-settings', { projectId: {{ $projectId }} })">
            <div class="d-flex items-center gap-2">
                @svg('heroicon-o-information-circle', 'w-4 h-4')
                Info
            </div>
        </x-ui-button>
    </div>
    
    @if($projectType === 'customer' && $customerCompanyName)
        <x-ui-company-info :company-name="$customerCompanyName" />
    @endif
    
    <div class="text-sm text-body mb-4">{{ $description ?? 'Keine Beschreibung' }}</div>
</div>
