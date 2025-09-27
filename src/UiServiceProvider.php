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
        Blade::component('ui::components.form.input-number', 'ui-input-number');
        Blade::component('ui::components.modal', 'ui-modal');
        // Kanban-Komponenten: Neue Atomic-Implementierungen
        Blade::component('ui::components.organisms.kanban-board', 'ui-kanban-board');
        Blade::component('ui::components.molecules.kanban-column', 'ui-kanban-column');
        Blade::component('ui::components.molecules.kanban-card', 'ui-kanban-card');
        Blade::component('ui::components.toast', 'ui-toast');
        Blade::component('ui::components.label', 'ui-label');
        Blade::component('ui::components.sidebar', 'ui-sidebar');
        Blade::component('ui::components.right-sidebar', 'ui-right-sidebar');
        Blade::component('ui::components.sidebar-module-header', 'sidebar-module-header');
        // Dashboard Tile: Neue Molecule-Implementierung (ersetzt die alte)
        Blade::component('ui::components.molecules.dashboard-tile', 'ui-dashboard-tile');
        Blade::component('ui::components.table', 'ui-table');
        Blade::component('ui::components.table-header', 'ui-table-header');
        Blade::component('ui::components.table-header-cell', 'ui-table-header-cell');
        Blade::component('ui::components.table-body', 'ui-table-body');
        Blade::component('ui::components.table-row', 'ui-table-row');
        Blade::component('ui::components.table-cell', 'ui-table-cell');

        // Newly added UI components (atoms)
        Blade::component('ui::components.atoms.avatar', 'ui-avatar');
        Blade::component('ui::components.atoms.panel', 'ui-panel');
        Blade::component('ui::components.atoms.checkbox', 'ui-checkbox');
        Blade::component('ui::components.atoms.input-text', 'ui-input-text');
        Blade::component('ui::components.atoms.input-textarea', 'ui-input-textarea');
        Blade::component('ui::components.atoms.input-select', 'ui-input-select');
        Blade::component('ui::components.atoms.breadcrumb-nav', 'ui-breadcrumb-nav');
        Blade::component('ui::components.atoms.collapsible-section', 'ui-collapsible-section');
        Blade::component('ui::components.atoms.status-badge', 'ui-status-badge');
        Blade::component('ui::components.atoms.sidebar-nav-item', 'ui-sidebar-nav-item');
        Blade::component('ui::components.atoms.info-display', 'ui-info-display');
        Blade::component('ui::components.atoms.confirm-button', 'ui-atoms-confirm-button');
        Blade::component('ui::components.atoms.info-banner', 'ui-info-banner');
        Blade::component('ui::components.atoms.role-select', 'ui-role-select');

        // Newly added UI components (molecules)
        Blade::component('ui::components.molecules.segmented-toggle', 'ui-segmented-toggle');
        Blade::component('ui::components.molecules.info-banner', 'ui-molecules-info-banner');
        Blade::component('ui::components.molecules.progress-bar', 'ui-progress-bar');
        Blade::component('ui::components.molecules.empty-state', 'ui-empty-state');
        Blade::component('ui::components.molecules.project-list-item', 'ui-project-list-item');
        Blade::component('ui::components.molecules.team-member-card', 'ui-team-member-card');
        Blade::component('ui::components.molecules.company-info', 'ui-company-info');
        Blade::component('ui::components.molecules.project-header', 'ui-project-header');
        Blade::component('ui::components.molecules.action-buttons', 'ui-action-buttons');
        Blade::component('ui::components.molecules.completed-task-item', 'ui-completed-task-item');
        Blade::component('ui::components.molecules.completed-tasks-list', 'ui-completed-tasks-list');
        Blade::component('ui::components.molecules.kanban-column', 'ui-molecules-kanban-column');
        Blade::component('ui::components.molecules.kanban-card', 'ui-molecules-kanban-card');
        Blade::component('ui::components.molecules.task-actions', 'ui-task-actions');
        Blade::component('ui::components.molecules.task-navigation', 'ui-task-navigation');
        Blade::component('ui::components.molecules.task-properties', 'ui-task-properties');
        Blade::component('ui::components.molecules.task-delete-actions', 'ui-task-delete-actions');
        Blade::component('ui::components.molecules.task-card', 'ui-task-card');
        Blade::component('ui::components.molecules.task-preview-card', 'ui-task-preview-card');
        Blade::component('ui::components.molecules.task-badges', 'ui-task-badges');
        Blade::component('ui::components.molecules.sidebar-section', 'ui-sidebar-section');
        Blade::component('ui::components.molecules.sidebar-project-list', 'ui-sidebar-project-list');
        Blade::component('ui::components.molecules.sidebar-general', 'ui-sidebar-general');
        Blade::component('ui::components.molecules.form-grid', 'ui-form-grid');
        Blade::component('ui::components.molecules.radio-group', 'ui-radio-group');
        Blade::component('ui::components.molecules.radio-list', 'ui-radio-list');
        Blade::component('ui::components.molecules.toggle-buttons', 'ui-toggle-buttons');
        Blade::component('ui::components.molecules.user-list', 'ui-user-list');
        Blade::component('ui::components.molecules.project-member-card', 'ui-project-member-card');
        Blade::component('ui::components.molecules.project-members-list', 'ui-project-members-list');

        // Newly added UI components (organisms)
        Blade::component('ui::components.organisms.page-header', 'ui-page-header');
        Blade::component('ui::components.organisms.stats-grid', 'ui-stats-grid');
        Blade::component('ui::components.organisms.detail-stats-grid', 'ui-detail-stats-grid');
        Blade::component('ui::components.organisms.team-members-list', 'ui-team-members-list');
        Blade::component('ui::components.organisms.project-list', 'ui-project-list');
        Blade::component('ui::components.organisms.tasks-info-sidebar', 'ui-tasks-info-sidebar');
        Blade::component('ui::components.organisms.tasks-kanban-container', 'ui-tasks-kanban-container');
        Blade::component('ui::components.organisms.kanban-board', 'ui-organisms-kanban-board');
        Blade::component('ui::components.organisms.task-header', 'ui-task-header');
        Blade::component('ui::components.organisms.task-form', 'ui-task-form');
        Blade::component('ui::components.organisms.task-sidebar', 'ui-task-sidebar');
        Blade::component('ui::components.organisms.sidebar-projects', 'ui-sidebar-projects');
        Blade::component('ui::components.organisms.sidebar', 'ui-organisms-sidebar');
        Blade::component('ui::components.organisms.right-sidebar', 'ui-organisms-right-sidebar');
        Blade::component('ui::components.organisms.modal', 'ui-organisms-modal');
        Blade::component('ui::components.organisms.task-layout', 'ui-task-layout');

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