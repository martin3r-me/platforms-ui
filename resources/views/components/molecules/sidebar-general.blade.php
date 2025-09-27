{{--
Sidebar General Component (Molecule)

Zweck: Allgemein-Bereich der Sidebar (Dashboard, Meine Aufgaben, Projekt anlegen)
Props:
- createProjectMethod: string (optional, default: 'createProject')

Beispiel:
<x-ui::components.molecules.sidebar-general 
    createProjectMethod="createProject"
/>
--}}

@props([
    'createProjectMethod' => 'createProject',
    'dashboardRoute' => '#',
    'myTasksRoute' => '#'
])

<div>
    <h4 x-show="!collapsed" class="p-3 text-sm text-white uppercase">Allgemein</h4>

    {{-- Dashboard --}}
    <x-ui-sidebar-nav-item 
        :href="$dashboardRoute"
        icon="heroicon-o-chart-bar"
        label="Dashboard"
        activeCondition="window.location.pathname === '/' || 
                        window.location.pathname.endsWith('/dashboard') || 
                        window.location.pathname.endsWith('/dashboard/') ||
                        (window.location.pathname.split('/').length === 1 && window.location.pathname === '/')"
    />

    {{-- Meine Aufgaben --}}
    <x-ui-sidebar-nav-item 
        :href="$myTasksRoute"
        icon="heroicon-o-home"
        label="Meine Aufgaben"
        activeCondition="window.location.pathname.includes('/my-tasks') || 
                        window.location.pathname.endsWith('/my-tasks')"
    />

    {{-- Projekt anlegen --}}
    <x-ui-sidebar-nav-item 
        href="#"
        icon="heroicon-o-plus"
        label="Projekt anlegen"
        :activeCondition="false"
        :wireClick="$createProjectMethod"
        :wireNavigate="false"
        variant="button"
    />
</div>
