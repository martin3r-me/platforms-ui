{{--
  Component: Company Info (Molecule)
  Zweck: Anzeige von Kunden-Firmeninformationen mit Icon.
  Props:
    - companyName: string – Firmenname
    - icon: string – Icon-Key (default: 'heroicon-o-building-office')
--}}

@props([
    'companyName' => '',
    'icon' => 'heroicon-o-building-office',
])

<div class="mt-2 text-sm text-secondary d-flex items-center gap-2">
    <x-heroicon-o-building-office class="w-4 h-4"/>
    <span>{{ $companyName }}</span>
</div>
