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
            'icon' => 'fas fa-users-cog', // Suitable for Admin section
            'route' => 'system.admin.index',
            'new-tab' => false,
            'module_name' => 'admins',
        ],
        [
            'title' => t('categories'),
            'icon' => 'fas fa-tags', // More appropriate for categories
            'route' => 'system.categories.index',
            'new-tab' => false,
            'module_name' => 'categories',
        ],
        [
            'title' => t('testimonials'),
            'icon' => 'fas fa-quote-right', // Suitable for testimonials
            'route' => 'system.testimonials.index',
            'new-tab' => false,
            'module_name' => 'testimonials',
        ],
        [
            'title' => t('destinations'),
            'icon' => 'fas fa-map-marked-alt', // Suitable for destinations
            'route' => 'system.destinations.index',
            'new-tab' => false,
            'module_name' => 'destinations',
        ],
        [
            'title' => t('favorites'),
            'icon' => 'fas fa-heart', // Appropriate icon for favorites
            'route' => 'system.favorites.index',
            'new-tab' => false,
            'module_name' => 'favorites',
        ],
        [
            'title' => t('images'),
            'icon' => 'fas fa-image', // Suitable for the images section
            'route' => 'system.images.index',
            'new-tab' => false,
            'module_name' => 'images',
        ],
        [
            'title' => t('tourevents'),
            'icon' => 'fas fa-calendar-alt', // More appropriate for tour events
            'route' => 'system.tourevents.index',
            'new-tab' => false,
            'module_name' => 'tourevents',
        ],
        [
            'title' => t('accommodations'),
            'icon' => 'fas fa-bed', // Suitable for accommodations
            'route' => 'system.accommodations.index',
            'new-tab' => false,
            'module_name' => 'accommodations',
        ],
        [
            'title' => t('settings'),
            'icon' => 'fas fa-cogs', // Suitable for settings
            'route' => 'system.settings.index',
            'new-tab' => false,
            'module_name' => 'settings',
        ],
        [
            'title' => t('partners'),
            'icon' => 'fas fa-handshake', // Suitable for partners or collaboration
            'route' => 'system.partners.index',
            'new-tab' => false,
            'module_name' => 'partners',
        ],
        [
            'title' => t('subscribes'),
            'icon' => 'fas fa-envelope', // Suitable for email subscriptions
            'route' => 'system.subscribes.index',
            'new-tab' => false,
            'module_name' => 'subscribes',
        ],
        [
            'title' => t('steps'),
            'icon' => 'fas fa-clipboard-list', // Suitable for steps or process
            'route' => 'system.steps.index',
            'new-tab' => false,
            'module_name' => 'steps',
        ],

        [
            'title' => t('pages'),
            'icon' => 'fas fa-clipboard-list', // Suitable for pages or process
            'route' => 'system.pages.index',
            'new-tab' => false,
            'module_name' => 'pages',
        ],

        [
            'title' => t('countries'),
            'icon' => 'fas fa-clipboard-list', // Suitable for countries or process
            'route' => 'system.countries.index',
            'new-tab' => false,
            'module_name' => 'countries',
        ],
        [
            'title' => t('bookings'),
            'icon' => 'fas fa-clipboard-list', // Suitable for bookings or process
            'route' => 'system.bookings.index',
            'new-tab' => false,
            'module_name' => 'bookings',
        ],

        [
            'title' => t('cities'),
            'icon' => 'fas fa-clipboard-list', // Suitable for cities or process
            'route' => 'system.cities.index',
            'new-tab' => false,
            'module_name' => 'cities',
        ],

        [
            'title' => t('users'),
            'icon' => 'fas fa-clipboard-list', // Suitable for users or process
            'route' => 'system.users.index',
            'new-tab' => false,
            'module_name' => 'users',
        ],


    ]
];
