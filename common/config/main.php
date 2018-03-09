<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    	'sendGrid' => [
    		'class' => 'bryglen\sendgrid\Mailer',
    		'username' => 'velder10',
    		'password' => 'Jesuisfidele100',
    		'viewPath' => '@common/mail', // your view path here
    	],
    	'i18n' => [
    		'translations' => [
    			'frontend*' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'backend*' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    		],
    	],
    ],
	'modules' => [
		'gii1' => [
			'class' => 'yii\gii\Module',
				'generators' => [
					'mongoDbModel' => [
						'class' => 'yii\mongodb\gii\model\Generator'
				]
			]
		]
	],
	'language' => 'fr-FR',
];
