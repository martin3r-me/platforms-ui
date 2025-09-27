{{--
  Component: Segmented Toggle (Molecule)
  Zweck: Umschalter zwischen Optionen (ähnlich einem Segment-Controller) mit Livewire-Binding.
  Props:
    - model: string – Livewire-Propertyname
    - options: array – [{ value, label, icon? }]
    - activeVariant: string – Farbvariante für aktive Option (z. B. 'success')
    - size: 'xs'|'sm'|'lg' – Größe der Buttons
--}}

@props([
    'model' => null, // Livewire property
    'options' => [], // [['value'=>'personal','label'=>'Persönlich','icon'=>'heroicon-o-user'], ...]
    'activeVariant' => 'success',
    'size' => 'sm',
    'current' => null,
])

@php
    $sizeClass = match($size) {
        'xs' => 'px-2 py-1 text-xs',
        'lg' => 'px-5 py-2 text-base',
        default => 'px-4 py-2 text-sm',
    };
@endphp

<div class="d-flex bg-surface border border-muted rounded-lg p-1 shadow-sm">
    @foreach($options as $opt)
        @php $val = $opt['value']; @endphp
        <button 
            type="button"
            class="rounded-md font-medium transition {{ $sizeClass }}"
            wire:click="$set('{{ $model }}', '{{ $val }}')"
            @class([
                "bg-{$activeVariant} text-on-{$activeVariant} shadow-sm" => (string)($current ?? '') === (string)$val,
                'text-body hover:text-secondary' => (string)($current ?? '') !== (string)$val,
            ])
        >
            <div class="d-flex items-center gap-2">
                @if(isset($opt['icon']))
                    @svg($opt['icon'], 'w-4 h-4')
                @endif
                <span>{{ $opt['label'] }}</span>
            </div>
        </button>
    @endforeach
</div>


