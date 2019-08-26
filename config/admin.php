<?php

// Config untuk menu yang ada di admin


return [
    'menu' => [
        'Menu Utama',
        [
            'text'    => 'Dashboard',
            'icon'    => 'home',
            'url'     => '',
        ],
        [
            'text'    => 'Pekerjaan',
            'icon'    => 'graduation-cap',
            'url'     => 'admin/work',
        ],
         [
            'text'    => 'Blog',
            'icon'    => 'user',
            'url'     => 'admin/blog',
        ],
        // [
        //     'text'    => 'Tabel Beasiswa',
        //     'icon'    => 'pen-square',
        //     'submenu' => [
        //           [
        //               'text' => 'Custom Field',
        //               'url'  => 'edit/datatable',
        //           ],
        //           [
        //               'text' => 'Data Table',
        //               'url'  => 'show/datatable/beasiswa',
        //           ],
        //       ],
        // ],
    ],
];
