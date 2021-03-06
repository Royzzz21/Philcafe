<?php

return [

	'user-management' => [
		'title' => 'User management',
		'fields' => [
		],
	],

	'roles' => [
		'title' => 'Roles',
		'fields' => [
			'title' => 'Title',
		],
	],

	'users' => [
		'title' => 'Users',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'remember-token' => 'Remember token',
		],
	],

	'cities' => [
		'title' => 'Cities',
		'fields' => [
			'name' => 'Name',
		],
	],

	'categories' => [
		'title' => 'Categories',
		'fields' => [
			'name' => 'Name',
		],
	],

    'subcategories' => [
        'title' => 'Subcategories',
        'fields' => [
            'name' => 'Name',
            'categories' => 'Categories',
        ],
    ],
    'items' => [
        'title' => 'My Item',
        'fields' => [
            'name' => 'Name',
            'price' => '₱rice',
            'city' => 'City',
            'categories' => 'Categories',
            'address' => 'Address',
            'description' => 'Description',
						'logo' => 'image #1',
						'logo1' => 'image #2',
						'logo2' => 'image #3',
						'logo3' => 'image #4',
        ],
    ],

    'qa_create' => 'Létrehozás',
	'qa_save' => 'Mentés',
	'qa_edit' => 'Szerkesztés',
	'qa_view' => 'Megtekintés',
	'qa_update' => 'Frissítés',
	'qa_list' => 'Lista',
	'qa_no_entries_in_table' => 'Nincs bejegyzés a táblában',
	'qa_logout' => 'Kijelentkezés',
	'qa_add_new' => 'Új hozzáadása',
	'qa_are_you_sure' => 'Biztosan így legyen?',
	'qa_back_to_list' => 'Vissza a listához',
	'qa_dashboard' => 'Vezérlőpult',
	'qa_delete' => 'Törlés',
	'qa_custom_controller_index' => 'Egyedi vezérlő index.',
    'quickadmin_title' => 'Philcafe Directory',
];
