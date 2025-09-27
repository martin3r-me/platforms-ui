{{--
Right Sidebar Component (Organism)

Zweck: Right-Sidebar-Komponente mit Toggle-Funktionalität
Props:
- collapsed: boolean (optional, default: false)
- widthCollapsed: string (optional, default: 'w-16')
- widthExpanded: string (optional, default: 'w-96')
- toggleTitle: string (optional, default: 'Sidebar umschalten')

Beispiel:
<x-ui-organisms-right-sidebar 
    :collapsed="false"
    widthCollapsed="w-16"
    widthExpanded="w-96"
    toggleTitle="Sidebar umschalten"
>
    <!-- Sidebar Content -->
</x-ui-organisms-right-sidebar>
--}}

@props([
    'collapsed' => false,
    'widthCollapsed' => 'w-16',
    'widthExpanded' => 'w-96',
    'toggleTitle' => 'Sidebar umschalten'
])

<div x-data="rightSidebarState()" x-init="init()" class="d-flex">
    <aside 
        x-cloak
        :class="collapsed ? '{{ $widthCollapsed }}' : '{{ $widthExpanded }}'"
        class="relative flex-shrink-0 h-full bg-primary transition-all duration-300 d-flex flex-col"
    >
        <!-- Header mit Logo und Toggle -->
        <div class="sticky top-0 z-10 bg-primary border-bottom-1 border-white border-opacity-20">
            <div class="d-flex items-center justify-between p-3">
                <!-- Logo -->
                <h1 x-show="!collapsed" class="text-2xl font-bold text-white flex items-center">Lumen</h1>
                
                <!-- Toggle Button -->
                <button 
                    @click="toggle()" 
                    class="d-flex items-center justify-center p-2 bg-primary transition-all duration-200 text-white rounded"
                    title="{{ $toggleTitle }}"
                >
                    <x-heroicon-o-chevron-double-right x-show="!collapsed" class="w-5 h-5" />
                    <x-heroicon-o-chevron-double-left x-show="collapsed" class="w-5 h-5" />
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-2 d-flex flex-col gap-2">
            {{ $slot ?? '' }}
        </div>
    </aside>
</div>

<script>
function rightSidebarState() {
    return {
        collapsed: {{ $collapsed ? 'true' : 'false' }},
        init() {
            this.collapsed = localStorage.getItem('sidebar-cursor-collapsed') === 'true';
        },
        toggle() {
            this.collapsed = !this.collapsed;
            localStorage.setItem('sidebar-cursor-collapsed', this.collapsed);
        }
    }
}
</script>
