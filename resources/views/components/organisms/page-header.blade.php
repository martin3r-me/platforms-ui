{{--
  Component: Page Header (Organism)
  Zweck: Seitenkopf mit Titel, optionalem Untertitel und Actions-Slot rechts.
  Props:
    - title: string – Hauptüberschrift
    - subtitle: string|null – Untertitel
  Slots:
    - actions: Tools/Buttons rechts
--}}

@props([
    'title' => '',
    'subtitle' => null,
])

<div class="mb-6">
    <div class="d-flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-secondary leading-tight">{{ $title }}</h1>
            @if($subtitle)
                <p class="text-body mt-0.5">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="d-flex items-center gap-4">
            {{ $actions ?? '' }}
        </div>
    </div>
</div>


