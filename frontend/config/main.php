<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    	'authClientCollection' => [
    		'class' => 'yii\authclient\Collection',
    		'clients' => [
    			'facebook' => [
    				'class' => 'yii\authclient\clients\Facebook',
    				'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
    				'clientId' => '185815931921472',
    				'clientSecret' => '77aa4bd2bc13d1af87c2314a3a4d638e',
    				'scope'        => [
    					'email',
    					'public_profile',
    					'user_friends',
    				],
    				'attributeNames' => ['name', 'email', 'first_name', 'last_name',
    						'id', 'cover', 'age_range', 'link', 'gender', 'locale', 'picture',
    						'timezone', 'updated_time', 'verified', 'friends'],
    			],
    			'twitter' => [
    				'class' => 'yii\authclient\clients\Twitter',
    				'attributeParams' => [
    					'include_email' => 'true', 
    					'include_entities' => 'true',
    					'skip_status' => 'false',
    				],
    				'consumerKey' => 'gOKVBnsvKpbOMBKjOQaAHD9VM',
    				'consumerSecret' => '8lUnGMBSxBgsUJYek9LC3BbuCoqG6uQwp7oETo24cPQ23L2LCb',
    			],
    			'google' => [
    				'class' => 'yii\authclient\clients\Google',
    				'clientId' => 'google_client_id',
    				'clientSecret' => 'google_client_secret',
    			],
    			'linkedin' => [
    				'class'        => 'yii\authclient\clients\LinkedIn',
    				'clientId'     => '78w692k5bk78hi',
    				'clientSecret' => 'NxB7HlOVAvCQ2oSd'
    			],
    		],
    	],
    		
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
