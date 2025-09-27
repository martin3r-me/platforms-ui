{{-- Wrapper: Weiterleitung auf neue Organism-Komponente --}}
<x-ui-organisms-sidebar
    {{ $attributes }}
    :collapsed="$collapsed ?? false"
    :widthCollapsed="$widthCollapsed ?? 'w-16'"
    :widthExpanded="$widthExpanded ?? 'w-80'"
    :toggleTitle="$toggleTitle ?? 'Sidebar umschalten'"
>
    {{ $slot }}
</x-ui-organisms-sidebar>