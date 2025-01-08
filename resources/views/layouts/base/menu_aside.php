<?php
// Aside menu
return [

    'items' => [
        [
            'title' => t('dashboard'),  // Localized title
            'root' => true,
            'icon' => 'fas fa-tachometer-alt',
            'route' => 'system_admin.dashboard',
            'module_name' => 'dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('admins'),
            'icon' => 'fas fa-user-shield',
            'route' => 'system.admin.index',
            'new-tab' => false,
            'module_name' => 'admins',
        ],
        [
            'title' => t('categories'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.categories.index',
            'new-tab' => false,
            'module_name' => 'categories',
        ],
        [
            'title' => t('settings'),
            'icon' => 'fas fa-cogs',
            'route' => 'system.settings.index',
            'new-tab' => false,
            'module_name' => 'settings',
        ],
    ]
];
