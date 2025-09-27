{{--
Modal Wrapper (Adapter)
Zweck: Weiterleitung auf neue Organism-Komponente für Rückwärtskompatibilität
--}}

@props([
    'model' => 'modalShow',
    'size' => 'md',
    'backdropClosable' => true,
    'escClosable' => true,
    'persistent' => false,
    'header' => null,
])

<x-ui-organisms-modal
    :model="$model"
    :size="$size"
    :backdropClosable="$backdropClosable"
    :escClosable="$escClosable"
    :persistent="$persistent"
    :header="$header"
>
    {{ $slot }}
    
    @if(isset($footer))
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif
</x-ui-organisms-modal>