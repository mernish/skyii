<?php

$params = array_merge(
    require(__DIR__.'/../../common/config/params.php'),
    require(__DIR__.'/../../common/config/params-local.php'),
    require(__DIR__.'/params.php'),
    require(__DIR__.'/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web'=> '/frontend/web'
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\jui\JuiAsset' => [
                    'js' => [],
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'js' => [],
                    'css' => [],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'skyii-frontend',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'site/index',
                '<action:(signup|login|logout|about|contact)>' => 'site/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
            ],
        ],
		'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation'=> true,
                ],
            ],
        ],
    ],
    'params' => $params,
];
