<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language'=>'th_TH',
   //'name'=>' <img style="height:40px; margin-top:12px;" src="./img/budget.png"> invoice',
    'name'=>'LTC',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
    'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => ['admin']
    ],
         'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
   'rbac' => 'dektrium\rbac\RbacWebModule',
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ],

],
       'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [  
            'site/*',
            'user/*',
            'gii/*',
           'rbac/*',
            //'after/*'
            
        ]
    ],
    'components' => [
         'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
 ],
          'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'QBzmMN7L0-Kp-fFoFWdWgC4HXe0K9Nmg',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
     
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
      
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
