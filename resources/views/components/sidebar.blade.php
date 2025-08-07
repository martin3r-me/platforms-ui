<div x-data="sidebarState()" x-init="init()" class="d-flex">
    <aside 
        x-cloak
        :class="collapsed ? 'w-16' : 'w-80'" 
        class="relative flex-shrink-0 h-full bg-white border-right-1 border-right-solid border-muted transition-all duration-300 d-flex flex-col"
    >
        <!-- Toggle -->
        <div class="sticky top-0 z-10 bg-white border-bottom-1 border-muted">
            <button 
                @click="toggle()" 
                class="w-full p-3 d-flex items-center justify-center bg-primary-10 transition"
                title="Sidebar umschalten"
            >
                <x-heroicon-o-chevron-double-left x-show="!collapsed" class="w-6 h-6 text-primary" />
                <x-heroicon-o-chevron-double-right x-show="collapsed" class="w-6 h-6 text-primary" />
            </button>
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
        collapsed: false,
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