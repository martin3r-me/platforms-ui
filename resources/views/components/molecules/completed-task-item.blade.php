{{--
  Component: Completed Task Item (Molecule)
  Zweck: Einzelner erledigter Task in der Liste.
  Props:
    - task: object – Task-Objekt
    - href: string – Link zur Task-Detail-Seite
--}}

@props([
    'task' => null,
    'href' => null,
])

<a href="{{ $href }}" 
   class="block p-2 bg-muted-5 rounded text-sm hover:bg-muted-10 transition"
   wire:navigate>
    <div class="d-flex items-center gap-2">
        <x-heroicon-o-check-circle class="w-4 h-4 text-success"/>
        <span class="truncate">{{ $task->title ?? '' }}</span>
    </div>
</a>
