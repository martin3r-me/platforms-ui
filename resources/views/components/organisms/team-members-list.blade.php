{{--
  Component: Team Members List (Organism)
  Zweck: Rasterliste von Team-Mitgliedern mit einheitlichen Karten und Empty State.
  Props:
    - members: Illuminate\Support\Collection|array – Daten der Mitglieder
  Slots:
    - default: ignoriert (nutzt interne Karten)
--}}

@props([
    'members' => collect(),
])

@if(count($members) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($members as $member)
            <x-ui-team-member-card
                :name="$member['name']"
                :email="$member['email']"
                :photo-url="$member['profile_photo_url'] ?? null"
                :open-tasks="$member['open_tasks']"
                :total-tasks="$member['total_tasks']"
                :completed-tasks="$member['completed_tasks']"
                :open-story-points="$member['open_story_points'] ?? 0"
                :total-story-points="$member['total_story_points'] ?? 0"
                :completed-story-points="$member['completed_story_points'] ?? 0"
            />
        @endforeach
    </div>
@else
    <x-ui-empty-state icon="heroicon-o-users" title="Keine Team-Mitglieder" message="Es sind noch keine Team-Mitglieder vorhanden." />
@endif


