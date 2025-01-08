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
            'title' => t('testimonials'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.testimonials.index',
            'new-tab' => false,
            'module_name' => 'testimonials',
        ],
        [
            'title' => t('destinations'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.destinations.index',
            'new-tab' => false,
            'module_name' => 'destinations',
        ],

        [
            'title' => t('favorites'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.favorites.index',
            'new-tab' => false,
            'module_name' => 'favorites',
        ],

        [
            'title' => t('images'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.images.index',
            'new-tab' => false,
            'module_name' => 'images',
        ],
        [
            'title' => t('tourevents'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.tourevents.index',
            'new-tab' => false,
            'module_name' => 'tourevents',
        ],        [
            'title' => t('accommodations'),
            'icon' => 'fas fa-list-alt',
            'route' => 'system.accommodations.index',
            'new-tab' => false,
            'module_name' => 'accommodations',
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
