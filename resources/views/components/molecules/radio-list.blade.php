{{--
Radio List Molecule
Zweck: Scrollbare Liste von Radio-Buttons mit Empty-State
Props: name, label, items, emptyMessage, maxHeight
Beispiel: <x-ui-radio-list name="selectedPrinterId" label="Drucker auswählen" :items="$printers" />
--}}

@props([
    'name' => '',
    'label' => '',
    'items' => [],
    'emptyMessage' => 'Keine Optionen verfügbar',
    'maxHeight' => 'max-h-40',
    'itemValue' => 'id',
    'itemLabel' => 'name',
])

<div class="space-y-2">
    @if($label)
        <label class="font-semibold text-sm">{{ $label }}</label>
    @endif
    
    @if($items->count() > 0)
        <div class="space-y-2 {{ $maxHeight }} overflow-y-auto border rounded-lg p-2">
            @foreach($items as $item)
                <label class="d-flex items-center gap-2 cursor-pointer p-2 hover:bg-muted-5 rounded">
                    <input 
                        type="radio" 
                        name="{{ $name }}" 
                        value="{{ $item->{$itemValue} }}" 
                        wire:model.live="{{ $name }}"
                        class="w-4 h-4"
                    >
                    <span class="text-sm">{{ $item->{$itemLabel} }}</span>
                </label>
            @endforeach
        </div>
    @else
        <div class="text-sm text-muted p-3 bg-muted-5 rounded-lg">
            {{ $emptyMessage }}
        </div>
    @endif
</div>
