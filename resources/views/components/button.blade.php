@props([
    'variant' => 'primary',
    'size' => 'md',             // sm, md, lg
    'disabled' => false,
    'border' => '1',
    'rounded' => 'md',
    'iconOnly' => false,
    'href' => null,             // Für Links
])

@php
    $isOutline = str_contains($variant, '-outline');
    $baseVariant = $isOutline ? str_replace('-outline', '', $variant) : $variant;

    // Farben
    $bgClass = $isOutline ? 'bg-transparent' : "bg-{$baseVariant}";
    $textClass = $isOutline ? "text-{$baseVariant}" : "text-on-{$baseVariant}";
    $borderClass = $isOutline ? "border border-{$border} border-solid border-{$baseVariant}" : '';
    $hoverClass = $isOutline ? "hover:bg-{$baseVariant} hover:text-on-{$baseVariant}" : '';
    $focusRing = "focus:outline-none focus:ring-2 focus:ring-{$baseVariant}-20";

    // Größen & Icon-Skalierung
    if ($iconOnly) {
        [$btnSize, $iconSize, $padding] = match($size) {
            'sm' => ['h-8 w-8', 'w-4 h-4', 'p-2'],
            'lg' => ['h-12 w-12', 'w-6 h-6', 'p-3'],
            default => ['h-10 w-10', 'w-5 h-5', 'p-2'],
        };
        $sizeClass = "{$btnSize} {$padding}";
        $roundedClass = 'rounded-full';
    } else {
        $sizeClass = match($size) {
            'sm' => 'h-8 text-sm px-3',
            'lg' => 'h-12 text-lg px-6',
            default => 'h-10 text-base px-4',
        };
        $iconSize = ''; // Standard, wenn Text+Icon gemischt wird
        $roundedClass = $rounded === 'none'
            ? 'rounded-none'
            : "rounded-{$rounded}";
    }

    $classes = implode(' ', array_filter([
        $bgClass,
        $borderClass,
        $textClass,
        $hoverClass,
        $focusRing,
        $roundedClass,
        'flex items-center justify-center transition-colors duration-200',
        $sizeClass,
        $disabled ? 'opacity-60 pointer-events-none' : '',
    ]));
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} @disabled($disabled)>
        <span class="flex items-center justify-center">
            {{ $iconOnly ? $slot->withAttributes(['class' => trim(($slot->attributes['class'] ?? '') . ' ' . $iconSize)]) : $slot }}
        </span>
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }} @disabled($disabled)>
        <span class="flex items-center justify-center">
            {{ $iconOnly ? $slot->withAttributes(['class' => trim(($slot->attributes['class'] ?? '') . ' ' . $iconSize)]) : $slot }}
        </span>
    </button>
@endif