{{--
Sidebar Projects Component (Organism)

Zweck: Projekte-Bereich der Sidebar mit Kunden- und Inhouse-Projekten
Props:
- customerProjects: Collection
- internalProjects: Collection

Beispiel:
<x-ui::components.organisms.sidebar-projects 
    :customerProjects="$customerProjects"
    :internalProjects="$internalProjects"
/>
--}}

@props([
    'customerProjects',
    'internalProjects',
    'projectRoute' => '#',
    'routeParam' => 'project',
    'alpineStoreName' => 'sidebarProjects'
])

<div x-show="!collapsed" x-data="{ openCustomer: (Alpine.store('{{ $alpineStoreName }}')?.openCustomer ?? true), openInternal: (Alpine.store('{{ $alpineStoreName }}')?.openInternal ?? true) }" x-init="Alpine.store('{{ $alpineStoreName }}') || Alpine.store('{{ $alpineStoreName }}', { openCustomer: openCustomer, openInternal: openInternal }); $watch('openCustomer', v => Alpine.store('{{ $alpineStoreName }}').openCustomer = v); $watch('openInternal', v => Alpine.store('{{ $alpineStoreName }}').openInternal = v)">
    {{-- Kundenprojekte --}}
    <x-ui-sidebar-section 
        title="Kundenprojekte"
        alpineStore="openCustomer"
        :defaultOpen="true"
    >
        <x-ui-sidebar-project-list 
            :projects="$customerProjects"
            :routeName="$projectRoute"
            :routeParam="$routeParam"
            icon="heroicon-o-briefcase"
            emptyMessage="Keine Kundenprojekte"
        />
    </x-ui-sidebar-section>

    {{-- Inhouse-Projekte --}}
    <div class="mt-3">
        <x-ui-sidebar-section 
            title="Inhouse Projekte"
            alpineStore="openInternal"
            :defaultOpen="true"
        >
            <x-ui-sidebar-project-list 
                :projects="$internalProjects"
                :routeName="$projectRoute"
                :routeParam="$routeParam"
                icon="heroicon-o-folder"
                emptyMessage="Keine Inhouse Projekte"
            />
        </x-ui-sidebar-section>
    </div>
</div>
