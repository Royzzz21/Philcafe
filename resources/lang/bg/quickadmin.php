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


	'qa_create' => 'Създай',
	'qa_save' => 'Запази',
	'qa_edit' => 'Промени',
	'qa_view' => 'Покажи',
	'qa_update' => 'Обнови',
	'qa_list' => 'Списък',
	'qa_no_entries_in_table' => 'Няма записи в таблицата',
	'qa_custom_controller_index' => 'Персонализиран контролер.',
	'qa_logout' => 'Изход',
	'qa_add_new' => 'Добави нов',
	'qa_are_you_sure' => 'Сигурни ли сте?',
	'qa_back_to_list' => 'Обратно към списъка',
	'qa_dashboard' => 'Табло',
	'qa_delete' => 'Изтрий',
	'quickadmin_title' => 'Philcafe Directory',
];
