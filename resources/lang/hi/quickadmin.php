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

    'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'qa_custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
    'quickadmin_title' => 'Philcafe Directory',
];
