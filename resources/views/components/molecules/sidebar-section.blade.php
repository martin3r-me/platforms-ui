{{--
Sidebar Section Component (Molecule)

Zweck: Kollapsible Sektion für Sidebar (z.B. Kundenprojekte, Inhouse-Projekte)
Props:
- title: string
- alpineStore: string (Alpine Store Key)
- defaultOpen: boolean (optional, default: true)
- content: slot

Beispiel:
<x-ui::components.molecules.sidebar-section 
    title="Kundenprojekte"
    alpineStore="openCustomer"
    :defaultOpen="true"
>
    <!-- Content -->
</x-ui::components.molecules.sidebar-section>
--}}

@props([
    'title',
    'alpineStore',
    'defaultOpen' => true
])

<div class="mt-2">
    <button type="button" class="w-full d-flex items-center justify-between px-3 py-2 text-sm uppercase text-white hover:bg-white hover:text-primary rounded" @click="{{ $alpineStore }} = !{{ $alpineStore }}">
        <span>{{ $title }}</span>
        <x-heroicon-o-chevron-down class="w-4 h-4 text-white" x-show="!{{ $alpineStore }}"/>
        <x-heroicon-o-chevron-up class="w-4 h-4 text-white" x-show="{{ $alpineStore }}"/>
    </button>
    <div x-show="{{ $alpineStore }}" class="mt-1">
        {{ $slot }}
    </div>
</div>
