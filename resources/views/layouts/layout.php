<?php

return [
    // General Layout Configuration
    'self' => [
        'layout' => 'default', // Options: 'blank', 'default'
        'rtl' => app()->getLocale()=='ar'? true : false,         // RTL support: true or false
    ],

    // JavaScript Configuration
    'js' => [
        'breakpoints' => [
            'sm' => 576,
            'md' => 768,
            'lg' => 992,
            'xl' => 1200,
            'xxl' => 1400
        ],
        'colors' => [
            'theme' => [
                'base' => [
                    'white' => '#ffffff',
                    'primary' => '#6993FF',
                    'secondary' => '#E5EAEE',
                    'success' => '#1BC5BD',
                    'info' => '#8950FC',
                    'warning' => '#FFA800',
                    'danger' => '#F64E60',
                    'light' => '#F3F6F9',
                    'dark' => '#212121'
                ],
                'light' => [
                    'primary' => '#E1E9FF',
                    'secondary' => '#ECF0F3',
                    'success' => '#C9F7F5',
                    'info' => '#EEE5FF',
                    'warning' => '#FFF4DE',
                    'danger' => '#FFE2E5',
                    'light' => '#F3F6F9',
                    'dark' => '#D6D6E0'
                ],
                'inverse' => [
                    'primary' => '#ffffff',
                    'secondary' => '#212121',
                    'success' => '#ffffff',
                    'info' => '#ffffff',
                    'warning' => '#ffffff',
                    'danger' => '#ffffff',
                    'light' => '#464E5F',
                    'dark' => '#ffffff'
                ]
            ],
            'gray' => [
                'gray-100' => '#F3F6F9',
                'gray-200' => '#ECF0F3',
                'gray-300' => '#E5EAEE',
                'gray-400' => '#D6D6E0',
                'gray-500' => '#B5B5C3',
                'gray-600' => '#80808F',
                'gray-700' => '#464E5F',
                'gray-800' => '#1B283F',
                'gray-900' => '#212121'
            ]
        ],
        'font-family' => 'Almarai',
    ],

    // Page Loader
    'page-loader' => [
        'type' => 'spinner-logo' // Options: 'default', 'spinner-message', 'spinner-logo'
    ],

    // Header Configuration
    'header' => [
        'self' => [
            'display' => true,
            'width' => 'fluid',    // Options: 'fixed', 'fluid'
            'theme' => 'light',    // Options: 'light', 'dark'
            'fixed' => [
                'desktop' => true,
                'mobile' => true
            ]
        ],
        'menu' => [
            'self' => [
                'display' => true,
                'layout'  => 'default', // Options: 'tab', 'default'
                'root-arrow' => false
            ],
            'desktop' => [
                'arrow' => true,
                'toggle' => 'click',
                'submenu' => [
                    'theme' => 'light',
                    'arrow' => true
                ]
            ],
            'mobile' => [
                'submenu' => [
                    'theme' => 'dark',
                    'accordion' => true
                ]
            ]
        ]
    ],

    // Subheader Configuration
    'subheader' => [
        'display' => false,
        'style' => 'solid', // Options: 'transparent', 'solid'
        'layout' => 'subheader-v1',
        'width' => 'fluid',
        'clear' => false
    ],

    // Content Area
    'content' => [
        'width' => 'fluid',   // Options: 'fluid', 'fixed'
        'extended' => false   // Extended layout: true or false
    ],

    // Brand Configuration
    'brand' => [
        'self' => [
            'theme' => 'dark'  // Options: 'light', 'dark'
        ]
    ],

    // Aside Configuration
    'aside' => [
        'self' => [
            'theme' => 'dark', // Options: 'light', 'dark'
            'display' => true,
            'fixed' => true,
            'minimize' => [
                'toggle' => true,
                'default' => false
            ]
        ],
        'menu' => [
            'dropdown' => false,
            'scroll' => false,
            'submenu' => [
                'accordion' => true
            ]
        ]
    ],

    // Footer Configuration
    'footer' => [
        'display' => false,
        'width' => 'fluid',
        'fixed' => false
    ],

    // Extras Configuration
    'extras' => [
        // Search
        'search' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'offcanvas' => [
                'direction' => 'right'
            ],
        ],

        // Notifications
        'notifications' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Quick Actions
        'quick-actions' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // User
        'user' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Languages
        'languages' => [
            'display' => false
        ],

        // Cart
        'cart' => [
            'display' => false,
            'dropdown' => [
                'style' => 'dark' // light|dark
            ]
        ],

        // Quick Panel
        'quick-panel' => [
            'display' => false,
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Chat
        'chat' => [
            'display' => false,
        ],

        // Page Toolbar
        'toolbar' => [
            'display' => false
        ],

        // Scrolltop
        'scrolltop' => [
            'display' => true
        ]
    ],


    // Resources
    'resources' => [
        'favicon' => 'admin/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700',
                    'Almarai:wght@300;400;700;800'
                ]
            ]
        ],
        'css' => [
            'plugins/global/plugins.bundle.min.css',
            'plugins/custom/prismjs/prismjs.bundle.min.css',
//            'css/style.bundle.css',
            app()->getLocale()=='ar'? 'css/style.bundle.rtl.css' : 'css/style.bundle.css'
        ],
        'js' => [
            'plugins/global/plugins.bundle.min.js',
            'plugins/custom/prismjs/prismjs.bundle.min.js',
            'js/scripts.bundle.js',
        ],
    ],

    // Custom Classes
    'classes' => [
        'actions' => 'btn btn-light-dark dropdown-toggle font-weight-bold btn-pill',
        'add' => 'btn btn-light-dark font-weight-bold btn-pill',
        'edit' => 'btn btn-light-dark font-weight-bold btn-pill',
        'delete' => 'btn btn-light-dark font-weight-bold btn-pill',
        'submit' => 'btn btn-light-dark font-weight-bold btn-pill mx-2',
        'cancel' => 'btn btn-light-dark font-weight-bold btn-pill mx-2'
    ]
];
