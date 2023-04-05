<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'yYy4YYYX8lYyYyQOl8vOcO6ROo7i8twO',
            'baseUrl' => '',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailtrap.io',
                'username' => 'c5f4aeda3d14b6',
                'password' => '5b08c736d140ee',
                'port' => '25',
                'encryption' => 'tls',
            ],
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['user'],
                    'prefix' => '',
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['categories'],
                    'prefix' => '',
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['stock'],
                    'prefix' => '',
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['product'],
                    'prefix' => '',
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['popular'],
                    'prefix' => '',
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/application', // своя придумка => 'namespace/controller'
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST handler' => 'handler-order',
                        'GET  index'=> 'index', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/application', // своя придумка => 'namespace/controller'
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST handler-order' => 'handler-order',
                        // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET  index'=> 'index', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'DELETE  delete-popular'=> 'delete-popular', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  insert-popular'=> 'insert-popular', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  update-popular'=> 'update-popular', // PATH url => action controller,
                    ],
                ],
                //product CRUD
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'DELETE  delete-product'=> 'delete-product', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  insert-product'=> 'insert-product', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  update-product'=> 'update-product', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'DELETE  delete-stock'=> 'delete-stock', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  insert-stock'=> 'insert-stock', // PATH url => action controller,
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST  update-stock'=> 'update-stock', // PATH url => action controller,
                    ],
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'popular' => 'popular',
                    ],
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET /' => 'index',
                    ],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'stock' => 'stock',
                    ],
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET /' => 'index',
                    ],

                ],
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*', '::8000'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
