@props([
    'name',
    'label'        => null,
    'value'        => null,   // ISO (YYYY-MM-DD) oder null
    'nullable'     => false,
    'nullLabel'    => '– Kein Datum –',
    'required'     => false,
    'variant'      => 'primary',
    'errorKey'     => null,
])

@php
    $errorKey = $errorKey ?: $name;
    $initial = $value ? \Illuminate\Support\Carbon::parse($value)->toDateString() : '';
    $display = $value ? \Illuminate\Support\Carbon::parse($value)->format('d.m.Y') : '';
@endphp

<div
    class="form-group"
    x-data="datepicker({
        initial: '{{ $initial }}',
        display: '{{ $display }}',
        localeNull: '{{ $nullLabel }}',
    })"
>
    @if($label)
        <x-ui-label :text="$label" :for="$name" :variant="$variant" :required="$required" class="mb-1" />
    @endif

    <div class="d-flex items-center gap-2">
        <button 
            type="button"
            class="form-control w-full text-left cursor-pointer py-2"
            @click="open()"
            :class="value ? 'text-body' : 'text-muted'"
            x-text="display || localeNull"
        ></button>
        @if($nullable)
            <button 
                type="button"
                class="ml-1 text-xs px-2 py-1 border-0 text-danger bg-danger-5 rounded-md"
                @click="clear()"
                x-show="value"
            >
                Löschen
            </button>
        @endif
    </div>

    <input 
        type="hidden"
        id="{{ $name }}"
        name="{{ $name }}"
        x-model="value"
        x-ref="input"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    />

    @error($errorKey)
        <span class="form-error mt-1">{{ $message }}</span>
    @enderror

    {{-- MODAL via Alpine --}}
    <template x-if="modalOpen">
        <div 
            class="position-fixed inset-0 z-100 d-flex justify-center items-center"
            style="background: rgba(0,0,0,0.24);"
            @keydown.window.escape="close()"
            x-cloak
        >
            <div class="bg-surface rounded-lg shadow-lg p-8 w-full max-w-xs d-flex flex-col items-center gap-4">
                <h2 class="text-lg font-semibold text-secondary mb-2 w-full text-center">Datum wählen</h2>
                <input 
                    type="date"
                    class="form-control w-full"
                    x-model="picker"
                    @change="setDate($event.target.value)"
                    :max="max"
                    :min="min"
                />
                <div class="d-flex gap-2 justify-end w-full mt-2">
                    @if($nullable)
                        <x-ui-button variant="danger-outline" size="sm" @click="clear()">Kein Datum</x-ui-button>
                    @endif
                    <x-ui-button variant="primary" size="sm" @click="close()">Abbrechen</x-ui-button>
                </div>
            </div>
        </div>
    </template>
</div>

@once
    @push('scripts')
        <script>
        function datepicker({ initial = '', display = '', localeNull = '– Kein Datum –' }) {
            return {
                value: initial,
                picker: initial,
                display: display,
                modalOpen: false,
                localeNull: localeNull,
                open() {
                    this.picker = this.value;
                    this.modalOpen = true;
                },
                close() {
                    this.modalOpen = false;
                },
                setDate(date) {
                    this.value = date;
                    this.display = date ? new Date(date).toLocaleDateString('de-DE') : '';
                    this.close();
                    this.$refs.input.dispatchEvent(new Event('input')); // wire:model triggern
                },
                clear() {
                    this.value = '';
                    this.picker = '';
                    this.display = '';
                    this.close();
                    this.$refs.input.dispatchEvent(new Event('input'));
                }
            }
        }
        </script>
    @endpush
@endonce