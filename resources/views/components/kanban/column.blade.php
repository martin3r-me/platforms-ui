{{-- Wrapper: Weiterleitung auf neue Molecule-Komponente --}}
<x-ui-molecules-kanban-column
    {{ $attributes }}
    :title="$title ?? 'Unbenannt'"
    :sortable-id="$sortableId ?? null"
    :scrollable="$scrollable ?? true"
    :footer="$footer ?? null"
>
    @isset($extra)
        <x-slot name="extra">{{ $extra }}</x-slot>
    @endisset
    {{ $slot }}
</x-ui-molecules-kanban-column>