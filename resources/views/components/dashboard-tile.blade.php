{{-- Adapter/Wrapper: Leitet auf die neue Molecule-Komponente weiter --}}
<x-ui-dashboard-tile
    {{ $attributes }}
    :title="$title ?? ''"
    :count="$count ?? 0"
    :icon="$icon ?? 'question-mark-circle'"
    :route="$route ?? null"
    :size="$size ?? 'md'"
    :variant="$variant ?? 'primary'"
    :trend="$trend ?? null"
    :trendValue="$trendValue ?? null"
    :description="$description ?? null"
    :loading="$loading ?? false"
    :clickable="$clickable ?? false"
    :href="$href ?? null"
    :target="$target ?? '_self'"
    :animate="$animate ?? false"
/>