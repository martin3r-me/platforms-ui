{{-- Wrapper: Weiterleitung auf neue Molecule-Komponente --}}
<x-ui-molecules-kanban-card
    {{ $attributes }}
    :title="$title ?? 'Card-Titel'"
    :sortable-id="$sortableId ?? null"
    :href="$href ?? null"
    :footer="$footer ?? null"
>
    {{ $slot }}
</x-ui-molecules-kanban-card>