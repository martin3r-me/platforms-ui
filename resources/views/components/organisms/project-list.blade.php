{{--
  Component: Project List (Organism)
  Zweck: Liste von Projekten mit Kennzahlen und standardisierten Items; inkl. Empty State.
  Props:
    - projects: Illuminate\Support\Collection|array – Projektdaten
  Slots:
    - default: ignoriert (nutzt interne Items)
--}}

@props([
    'projects' => collect(),
    'projectRoute' => '#',
])

@if(count($projects) > 0)
    <div>
        @foreach($projects as $project)
            <x-ui-project-list-item
                :name="$project['name']"
                :open-tasks="$project['open_tasks']"
                :total-tasks="$project['total_tasks']"
                :story-points="$project['story_points'] ?? 0"
                :href="$projectRoute !== '#' ? route($projectRoute, $project['id']) : '#'"
            />
        @endforeach
    </div>
@else
    <x-ui-empty-state icon="heroicon-o-folder" title="Keine aktiven Projekte" message="Du hast noch keine Projekte oder bist in keinem Projekt zuständig." />
@endif


