<?php

namespace Platform\Ui;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class UiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        file_put_contents(storage_path('logs/ui-provider-debug.txt'), now()." UiServiceProvider BOOT\n", FILE_APPEND);
        // Views laden & publishen
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ui');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/ui'),
        ], 'ui-views');

        // Konfiguration publishen
        $this->publishes([
            __DIR__ . '/../config/ui.php' => config_path('ui.php'),
        ], 'ui-config');

        // Assets publishen
        $this->publishes([
            __DIR__ . '/../resources/assets/css/ui.css' => public_path('vendor/ui/ui.css'),
            __DIR__ . '/../resources/assets/css/ui.min.css' => public_path('vendor/ui/ui.min.css'),
            __DIR__ . '/../resources/assets/js/ui.js'   => public_path('vendor/ui/ui.js'),
        ], 'ui-assets');

        // Blade-Komponenten registrieren
        Blade::component('ui::components.ui-styles', 'ui-styles');
        Blade::component('ui::components.button', 'ui-button');
        Blade::component('ui::components.tab', 'ui-tab');
        Blade::component('ui::components.badge', 'ui-badge');
        Blade::component('ui::components.grouped-list', 'ui-grouped-list');
        Blade::component('ui::components.grouped-list-item', 'ui-grouped-list-item');
        Blade::component('ui::components.confirm-button', 'ui-confirm-button');
        Blade::component('ui::components.form.input-text', 'ui-input-text');
        Blade::component('ui::components.form.input-textarea', 'ui-input-textarea');
        Blade::component('ui::components.form.input-checkbox', 'ui-input-checkbox');
        Blade::component('ui::components.form.input-select', 'ui-input-select');
        Blade::component('ui::components.form.input-date', 'ui-input-date');
        Blade::component('ui::components.modal', 'ui-modal');
        Blade::component('ui::components.kanban.board', 'ui-kanban-board');
        Blade::component('ui::components.kanban.column', 'ui-kanban-column');
        Blade::component('ui::components.kanban.card', 'ui-kanban-card');
        Blade::component('ui::components.toast', 'ui-toast');
        Blade::component('ui::components.label', 'ui-label');
        Blade::component('ui::components.sidebar', 'ui-sidebar');
        Blade::component('ui::components.dashboard-tile', 'ui-dashboard-tile');

        $aliases = \Illuminate\Support\Facades\Blade::getClassComponentAliases();
        file_put_contents(
            storage_path('logs/ui-provider-debug.txt'),
            now()." Aktuelle Blade-Class-Aliase: ".json_encode($aliases)."\n",
            FILE_APPEND
        );


        $sidebarViewExists = view()->exists('ui::components.sidebar');
        file_put_contents(
            storage_path('logs/ui-provider-debug.txt'),
            now()." View 'ui::components.sidebar' exists (Provider-Ende): ".($sidebarViewExists ? 'JA' : 'NEIN')."\n",
            FILE_APPEND
        );

    }

    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__ . '/../config/ui.php', 'ui');

        // Optional: Heroicons oder andere UI-Dependencies
        $this->app->register(\BladeUI\Heroicons\BladeHeroiconsServiceProvider::class);
    }
}