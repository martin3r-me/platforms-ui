{{--
Sidebar Project List Component (Molecule)

Zweck: Projektliste für Sidebar mit Links und Icons
Props:
- projects: Collection
- routeName: string (optional, default: '#')
- routeParam: string (optional, default: 'project')
- icon: string (optional, default: 'heroicon-o-briefcase')
- emptyMessage: string (optional, default: 'Keine Projekte')

Beispiel:
<x-ui::components.molecules.sidebar-project-list 
    :projects="$customerProjects"
    routeName="#"
    routeParam="project"
    icon="heroicon-o-briefcase"
    emptyMessage="Keine Kundenprojekte"
/>
--}}

@props([
    'projects',
    'routeName' => '#',
    'routeParam' => 'project',
    'icon' => 'heroicon-o-briefcase',
    'emptyMessage' => 'Keine Projekte'
])

@foreach($projects as $project)
    <a href="{{ route($routeName, [$routeParam => $project]) }}"
       class="relative d-flex items-center p-2 my-1 rounded-md font-medium transition gap-3"
       :class="[
           window.location.pathname.includes('/projects/{{ $project->id }}/') || 
           window.location.pathname.includes('/projects/{{ $project->uuid }}/') ||
           window.location.pathname.endsWith('/projects/{{ $project->id }}') ||
           window.location.pathname.endsWith('/projects/{{ $project->uuid }}') ||
           (window.location.pathname.split('/').length === 2 && window.location.pathname.endsWith('/{{ $project->id }}')) ||
           (window.location.pathname.split('/').length === 2 && window.location.pathname.endsWith('/{{ $project->uuid }}'))
               ? 'bg-white text-primary shadow-md'
               : 'text-white hover:bg-white hover:text-primary hover:shadow-md'
       ]"
       wire:navigate>
        <x-dynamic-component :component="$icon" class="w-6 h-6 flex-shrink-0"/>
        <span class="truncate">{{ $project->name }}</span>
    </a>
@endforeach
@if($projects->isEmpty())
    <div class="px-3 py-1 text-xs text-white text-opacity-70">{{ $emptyMessage }}</div>
@endif
