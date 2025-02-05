<?php
// Header menu
return [

    'items' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ]
    ],

    'admins' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('admin_management'),
            'root' => true,
            'route' => 'system.admin.index',
            'new-tab' => false,
            'module_name' => 'admins',
        ]
    ],



    'areas' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('cities_and_governorates'),
            'root' => true,
            'route' => 'system.areas.index',
            'new-tab' => false,
            'module_name' => 'areas',
        ],
        [
            'title' => t('add_city_or_governorate'),
            'root' => true,
            'route' => 'system.areas.create',
            'new-tab' => false,
            'module_name' => 'areas',
            'module_action' => 'add',
        ],
    ],

    'categories' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('categories'),
            'root' => true,
            'route' => 'system.categories.index',
            'new-tab' => false,
            'module_name' => 'categories',
        ],
        [
            'title' => t('add_category'),
            'root' => true,
            'route' => 'system.categories.create',
            'new-tab' => false,
            'module_name' => 'categories',
            'module_action' => 'add',
        ],
    ],
    'destinations' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('destinations'),
            'root' => true,
            'route' => 'system.destinations.index',
            'new-tab' => false,
            'module_name' => 'destinations',
        ],
        [
            'title' => t('add_destination'),
            'root' => true,
            'route' => 'system.destinations.create',
            'new-tab' => false,
            'module_name' => 'destinations',
            'module_action' => 'add',
        ],
    ],

    'testimonials' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('testimonials'),
            'root' => true,
            'route' => 'system.testimonials.index',
            'new-tab' => false,
            'module_name' => 'testimonials',
        ],
        [
            'title' => t('add_testimonial'),
            'root' => true,
            'route' => 'system.testimonials.create',
            'new-tab' => false,
            'module_name' => 'testimonials',
            'module_action' => 'add',
        ],
    ],

    'images' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('images'),
            'root' => true,
            'route' => 'system.images.index',
            'new-tab' => false,
            'module_name' => 'images',
        ],
        [
            'title' => t('add_image'),
            'root' => true,
            'route' => 'system.images.create',
            'new-tab' => false,
            'module_name' => 'images',
            'module_action' => 'add',
        ],
    ],

    'favorites' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('favorites'),
            'root' => true,
            'route' => 'system.favorites.index',
            'new-tab' => false,
            'module_name' => 'favorites',
        ],
        [
            'title' => t('add_favorite'),
            'root' => true,
            'route' => 'system.favorites.create',
            'new-tab' => false,
            'module_name' => 'favorites',
            'module_action' => 'add',
        ],
    ],

    'services' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('services'),
            'root' => true,
            'route' => 'system.services.index',
            'new-tab' => false,
            'module_name' => 'services',
        ]
    ],
    'accommodations' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('accommodations'),
            'root' => true,
            'route' => 'system.accommodations.index',
            'new-tab' => false,
            'module_name' => 'accommodations',
        ]
    ],
    'tourevents' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('tourevents'),
            'root' => true,
            'route' => 'system.tourevents.index',
            'new-tab' => false,
            'module_name' => 'tourevents',
        ]
    ],
    'partners' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('partners'),
            'root' => true,
            'route' => 'system.partners.index',
            'new-tab' => false,
            'module_name' => 'partners',
        ]
    ],

    'subscribes' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('subscribes'),
            'root' => true,
            'route' => 'system.subscribes.index',
            'new-tab' => false,
            'module_name' => 'subscribes',
        ]
    ],

    'steps' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('steps'),
            'root' => true,
            'route' => 'system.steps.index',
            'new-tab' => false,
            'module_name' => 'steps',
        ]
    ],

    'pages' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('pages'),
            'root' => true,
            'route' => 'system.pages.index',
            'new-tab' => false,
            'module_name' => 'pages',
        ]
    ],

    'users' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('users'),
            'root' => true,
            'route' => 'system.users.index',
            'new-tab' => false,
            'module_name' => 'users',
        ]
    ],



    'notifications' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('notifications'),
            'root' => true,
            'route' => 'system.notifications.index',
            'new-tab' => false,
            'module_name' => 'notifications',
        ],
        [
            'title' => t('add_notification'),
            'root' => true,
            'route' => 'system.notifications.create',
            'new-tab' => false,
            'module_name' => 'notifications',
            'module_action' => 'add',
        ],
    ],

    'users' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('users'),
            'root' => true,
            'route' => 'system.users.index',
            'new-tab' => false,
            'module_name' => 'users',
        ],
    ],


    'countries' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('countries'),
            'root' => true,
            'route' => 'system.countries.index',
            'new-tab' => false,
            'module_name' => 'countries',
        ],
    ],


    'cities' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('cities'),
            'root' => true,
            'route' => 'system.cities.index',
            'new-tab' => false,
            'module_name' => 'cities',
        ],
    ],

    'bookings' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('bookings'),
            'root' => true,
            'route' => 'system.bookings.index',
            'new-tab' => false,
            'module_name' => 'bookings',
        ],
    ],

    'products' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('stores'),
            'root' => true,
            'route' => 'system.products.index',
            'new-tab' => false,
            'module_name' => 'products',
        ],
        [
            'title' => t('store'),
            'root' => true,
            'route' => 'system.products.create',
            'new-tab' => false,
            'module_name' => 'products',
            'module_action' => 'add',
        ],
    ],

    'products2' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('products'),
            'root' => true,
            'route' => 'system.products2.index',
            'new-tab' => false,
            'module_name' => 'products2',
        ],
        [
            'title' => t('product'),
            'root' => true,
            'route' => 'system.products2.create',
            'new-tab' => false,
            'module_name' => 'products2',
            'module_action' => 'add',
        ],
    ],

    'refunds' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('refund_requests'),
            'root' => true,
            'route' => 'system.refunds.index',
            'new-tab' => false,
            'module_name' => 'refunds',
        ]
    ],

    'sizes' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('sizes'),
            'root' => true,
            'route' => 'system.sizes.index',
            'new-tab' => false,
            'module_name' => 'sizes',
        ]
    ],

    'sections' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('categories'),
            'root' => true,
            'route' => 'system.sections.index',
            'new-tab' => false,
            'module_name' => 'sections',
        ]
    ],

    'cruds' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('cruds'),
            'root' => true,
            'route' => 'system.cruds.index',
            'new-tab' => false,
            'module_name' => 'cruds',
        ],
        [
            'title' => t('add_crud'),
            'root' => true,
            'route' => 'system.cruds.create',
            'new-tab' => false,
            'module_name' => 'cruds',
            'module_action' => 'add',
        ],
    ],

    'coupons' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('discount_coupons'),
            'root' => true,
            'route' => 'system.coupons.index',
            'new-tab' => false,
            'module_name' => 'coupons',
        ]
    ],

    'branches' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('branch_management'),
            'root' => true,
            'route' => 'system.branches.index',
            'new-tab' => false,
            'module_name' => 'branches',
        ],
    ],
    'countries' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('countries_management'),
            'root' => true,
            'route' => 'system.countries.index',
            'new-tab' => false,
            'module_name' => 'countries',
        ],
    ],

    'containers' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('containers_management'),
            'root' => true,
            'route' => 'system.containers.index',
            'new-tab' => false,
            'module_name' => 'containers',
        ],
    ],
    'beneficiaries' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('beneficiaries_management'),
            'root' => true,
            'route' => 'system.beneficiaries.index',
            'new-tab' => false,
            'module_name' => 'beneficiaries',
        ],
    ],
    'shipments' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('shipments_management'),
            'root' => true,
            'route' => 'system.shipments.index',
            'new-tab' => false,
            'module_name' => 'shipments',
        ],
    ],

    'offers' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('offers'),
            'root' => true,
            'route' => 'system.offers.index',
            'new-tab' => false,
            'module_name' => 'offers',
        ]
    ],

    'shops' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('stores'),
            'root' => true,
            'route' => 'system.shops.index',
            'new-tab' => false,
            'module_name' => 'shops',
        ]
    ],


    'colors' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('colors'),
            'root' => true,
            'route' => 'system.colors.index',
            'new-tab' => false,
            'module_name' => 'colors',
        ]
    ],

    'shipping' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('shipping_method'),
            'root' => true,
            'route' => 'system.shipping.index',
            'new-tab' => false,
            'module_name' => 'shipping',
        ]
    ],
    'flight_cargos' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('flight_cargos'),
            'root' => true,
            'route' => 'system.flight_cargos.index',
            'new-tab' => false,
            'module_name' => 'flight_cargos',
        ]
    ],
    'activities' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('activities'),
            'root' => true,
            'route' => 'system.activities.index',
            'new-tab' => false,
            'module_name' => 'activities',
        ]
    ],

    'tickets' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('ticket'),
            'root' => true,
            'route' => 'system.tickets.index',
            'new-tab' => false,
            'module_name' => 'tickets',
        ],
    ],

    'rewards' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('reward'),
            'root' => true,
            'route' => 'system.rewards.index',
            'new-tab' => false,
            'module_name' => 'rewards',
        ],
    ],

    'points' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('point'),
            'root' => true,
            'route' => 'system.points.index',
            'new-tab' => false,
            'module_name' => 'points',
        ],
    ],

    'forms' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('form'),
            'root' => true,
            'route' => 'system.forms.index',
            'new-tab' => false,
            'module_name' => 'forms',
        ],
    ],

    'inboxes' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('inbox'),
            'root' => true,
            'route' => 'system.inbox.index',
            'new-tab' => false,
            'module_name' => 'inboxes',
        ],
    ],

    'posts' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('post'),
            'root' => true,
            'route' => 'system.posts.index',
            'new-tab' => false,
            'module_name' => 'posts',
        ],
    ],

    'comments' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('comment'),
            'root' => true,
            'route' => 'system.comments.index',
            'new-tab' => false,
            'module_name' => 'comments',
        ],
    ],

    'restaurants' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('restaurant'),
            'root' => true,
            'route' => 'system.restaurants.index',
            'new-tab' => false,
            'module_name' => 'restaurants',
        ],
    ],

    'numbers' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('number'),
            'root' => true,
            'route' => 'system.numbers.index',
            'new-tab' => false,
            'module_name' => 'numbers',
        ],
    ],

    'invoices' => [
        [
            'title' => t('dashboard'),
            'root' => true,
            'route' => 'system_admin.dashboard',
            'new-tab' => false,
        ],
        [
            'title' => t('invoice'),
            'root' => true,
            'route' => 'system.invoices.index',
            'new-tab' => false,
            'module_name' => 'invoices',
        ],
    ],

];
