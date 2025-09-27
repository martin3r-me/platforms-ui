{{--
Sidebar Component (Organism)

Zweck: Haupt-Sidebar-Komponente mit Toggle-Funktionalität
Props:
- collapsed: boolean (optional, default: false)
- widthCollapsed: string (optional, default: 'w-16')
- widthExpanded: string (optional, default: 'w-80')
- toggleTitle: string (optional, default: 'Sidebar umschalten')

Beispiel:
<x-ui::components.organisms.sidebar 
    :collapsed="false"
    widthCollapsed="w-16"
    widthExpanded="w-80"
    toggleTitle="Sidebar umschalten"
>
    <!-- Sidebar Content -->
</x-ui::components.organisms.sidebar>
--}}

@props([
    'collapsed' => false,
    'widthCollapsed' => 'w-16',
    'widthExpanded' => 'w-80',
    'toggleTitle' => 'Sidebar umschalten'
])

<div x-data="sidebarState()" x-init="init()" class="d-flex">
    <aside 
        x-cloak
        :class="collapsed ? '{{ $widthCollapsed }}' : '{{ $widthExpanded }}'" 
        class="relative flex-shrink-0 h-full bg-primary transition-all duration-300 d-flex flex-col"
    >
        <!-- Header mit Logo und Toggle -->
        <div class="sticky top-0 z-10 bg-primary border-bottom-1 border-white border-opacity-20">
            <div class="d-flex items-center justify-between p-3">
                <!-- Logo -->
                <h1 x-show="!collapsed" class="text-2xl font-bold text-white flex items-center">GlowKit</h1>
                
                <!-- Toggle Button -->
                <button 
                    @click="toggle()" 
                    class="d-flex items-center justify-center p-2 bg-primary transition-all duration-200 text-white rounded"
                    title="{{ $toggleTitle }}"
                >
                    <x-heroicon-o-chevron-double-left x-show="!collapsed" class="w-5 h-5" />
                    <x-heroicon-o-chevron-double-right x-show="collapsed" class="w-5 h-5" />
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-2 d-flex flex-col gap-2">
            {{ $slot ?? '' }}
        </nav>
    </aside>
</div>

<script>
function sidebarState() {
    return {
        collapsed: {{ $collapsed ? 'true' : 'false' }},
        init() {
            this.collapsed = localStorage.getItem('sidebar-collapsed') === 'true';
        },
        toggle() {
            this.collapsed = !this.collapsed;
            localStorage.setItem('sidebar-collapsed', this.collapsed);
        }
    }
}
</script>
