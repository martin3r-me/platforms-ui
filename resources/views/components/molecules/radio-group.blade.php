{{--
Radio Group Molecule
Zweck: Gruppe von Radio-Buttons mit Label
Props: name, label, options (Array), value, direction (horizontal/vertical)
Beispiel: <x-ui-radio-group name="printTarget" label="Druckziel wählen" :options="$printOptions" />
--}}

@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'value' => '',
    'direction' => 'horizontal',
    'gap' => 4,
])

@php
    $directionClass = $direction === 'vertical' ? 'flex-col' : 'd-flex';
    $gapClass = match($gap) {
        2 => 'gap-2',
        3 => 'gap-3',
        4 => 'gap-4',
        6 => 'gap-6',
        default => 'gap-4'
    };
@endphp

<div class="space-y-2">
    @if($label)
        <label class="font-semibold text-sm">{{ $label }}</label>
    @endif
    
    <div class="{{ $directionClass }} {{ $gapClass }}">
        @foreach($options as $option)
            <label class="d-flex items-center gap-2 cursor-pointer">
                <input 
                    type="radio" 
                    name="{{ $name }}" 
                    value="{{ $option['value'] }}" 
                    wire:model.live="{{ $name }}"
                    class="w-4 h-4"
                >
                <span class="text-sm">{{ $option['label'] }}</span>
            </label>
        @endforeach
    </div>
</div>
