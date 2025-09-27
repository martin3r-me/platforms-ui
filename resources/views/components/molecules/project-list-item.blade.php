{{--
  Component: Project List Item (Molecule)
  Zweck: Zeilen-Item für Projektlisten mit Kennzahlen und CTA.
  Props:
    - name: string – Projektname
    - openTasks: int – offene Aufgaben
    - totalTasks: int – Gesamtaufgaben
    - storyPoints: int – Story Points
    - href: string|null – Link zum Projekt
--}}

@props([
    'name' => '',
    'openTasks' => 0,
    'totalTasks' => 0,
    'storyPoints' => 0,
    'href' => null,
])

<div class="d-flex items-center justify-between p-4 my-2 bg-white border border-muted rounded-lg shadow-sm hover:shadow-md transition">
    <div class="d-flex items-center gap-4">
        <div class="w-10 h-10 bg-primary text-on-primary rounded-lg d-flex items-center justify-center">
            <x-heroicon-o-folder class="w-5 h-5"/>
        </div>
        <div>
            <h4 class="font-medium text-secondary leading-tight mb-0">{{ $name }}</h4>
            <p class="text-sm text-body mt-0.5 mb-0">
                {{ $openTasks }} offene von {{ $totalTasks }} Aufgaben
                @if($storyPoints > 0)
                    • {{ $storyPoints }} Story Points
                @endif
            </p>
        </div>
    </div>
    @if($href)
        <x-ui-button variant="primary" size="sm" href="{{ $href }}" class="d-flex items-center justify-center">
            <div class="d-flex items-center justify-center gap-2">
                @svg('heroicon-o-arrow-right', 'w-4 h-4')
                <span>Öffnen</span>
            </div>
        </x-ui-button>
    @endif
</div>


