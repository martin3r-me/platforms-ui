{{--
Toggle Buttons Molecule
Zweck: Gruppe von Toggle-Buttons für Auswahl zwischen Optionen
Props: name, label, options, value, disabled, infoText
Beispiel: <x-ui-toggle-buttons name="projectType" label="Projekttyp" :options="$typeOptions" />
--}}

@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'value' => '',
    'disabled' => false,
    'infoText' => '',
    'size' => 'sm',
])

<div class="mt-4">
    @if($label)
        <label class="block text-sm font-medium mb-1">{{ $label }}</label>
    @endif
    
    <div class="d-flex gap-2">
        @foreach($options as $option)
            <x-ui-button 
                :size="$size"
                :variant="$value === $option['value'] ? 'primary' : 'secondary-outline'"
                @click="$wire.set{{ ucfirst($name) }}('{{ $option['value'] }}')"
                :disabled="$disabled || ($option['disabled'] ?? false)"
            >
                {{ $option['label'] }}
            </x-ui-button>
        @endforeach
    </div>
    
    @if($infoText)
        <div class="text-xs text-muted mt-1">{{ $infoText }}</div>
    @endif
</div>
