{{--
Sidebar Nav Item Component (Atom)

Zweck: Einzelner Navigation-Link für Sidebar
Props:
- href: string
- icon: string (Heroicon-Klasse)
- label: string
- activeCondition: string (JavaScript-Condition für aktiven Zustand)
- wireClick: string (optional, für wire:click)
- wireNavigate: boolean (optional, default: true)

Beispiel:
<x-ui::components.atoms.sidebar-nav-item 
    href="/dashboard"
    icon="heroicon-o-chart-bar"
    label="Dashboard"
    activeCondition="window.location.pathname === '/'"
/>
--}}

@props([
    'href' => '#',
    'icon',
    'label',
    'activeCondition',
    'wireClick' => null,
    'wireNavigate' => true,
    'variant' => 'default' // default, button
])

<a href="{{ $href }}"
   class="relative d-flex items-center p-2 my-1 rounded-md font-medium transition"
   :class="[
       @if($variant === 'button')
           'text-white text-opacity-60 hover:text-primary hover:bg-white'
       @else
           ({{ $activeCondition }}) ? 'bg-white text-primary shadow-md' : 'text-white hover:bg-white hover:text-primary hover:shadow-md'
       @endif,
       collapsed ? 'justify-center' : 'gap-3'
   ]"
   @if($wireClick) wire:click="{{ $wireClick }}" @endif
   @if($wireNavigate) wire:navigate @endif>
    <x-dynamic-component :component="$icon" class="w-6 h-6 flex-shrink-0"/>
    <span x-show="!collapsed" class="truncate">{{ $label }}</span>
</a>
