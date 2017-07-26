<?php
/**
 * Setting maximum execution time to unlimited so admin lte themes can be generated as assets.
 * Removing or disabling this may cause some problems in generating the assets files for admin lte.
 */
set_time_limit(0);

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
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
    ],
];

if (!YII_ENV_TEST) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],

        /**
         * Using custom templates for CRUD generator in Gii
         */
        'generators' => [
            'crud' => [
                'class' => 'backend\templates\crud\Generator',
                'templates' => [
                    'admin-lte' => '@backend/templates/crud/admin-lte',
                ]
            ],
            'model' => [
                'class' => 'backend\templates\model\Generator',
                'templates' => [
                    'admin-lte' => '@backend/templates/model/admin-lte',
                ]
            ]
        ],

    ];
}

return $config;
