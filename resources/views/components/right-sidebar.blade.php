{{-- Wrapper: Weiterleitung auf neue Organism-Komponente --}}
<x-ui-organisms-right-sidebar
    {{ $attributes }}
    :collapsed="$collapsed ?? false"
    :widthCollapsed="$widthCollapsed ?? 'w-16'"
    :widthExpanded="$widthExpanded ?? 'w-96'"
    :backgroundColor="$backgroundColor ?? 'bg-white'"
    :borderColor="$borderColor ?? 'border-muted'"
    :headerBackground="$headerBackground ?? 'bg-white'"
    :headerBorderColor="$headerBorderColor ?? 'border-muted'"
    :toggleBackground="$toggleBackground ?? 'bg-primary-10'"
    :toggleTitle="$toggleTitle ?? 'Sidebar umschalten'"
    :toggleIconColor="$toggleIconColor ?? 'text-primary'"
    :storageKey="$storageKey ?? 'sidebar-cursor-collapsed'"
>
    {{ $slot }}
</x-ui-organisms-right-sidebar>


