<?php
$params = array_merge(
    require(__DIR__.'/../../common/config/params.php'),
    require(__DIR__.'/../../common/config/params-local.php'),
    require(__DIR__.'/params.php'),
    require(__DIR__.'/params-local.php')
);

return [
    'id' => 'skyii-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'layout' => 'main',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin'
        ],
        'user' => [
            'identityClass' => 'modules\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/login']
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'skyii-backend',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'login' => 'user/user/login',
                'logout' => 'user/user/logout',
                'profile' => 'user/profile/view',
                'profile/update' => 'user/profile/update',
                '<controller:(branch|state|country)>' => '<controller>/index',
                'user' => 'user/user/index',
                'user/create' => 'user/user/create',
                'user/<id:\d+>' => 'user/user/view',
                'user/<id:\d+>/update' => 'user/user/update',
                '<module:\w+>/' => '<module>/default/index',
                '<module:\w+>/create' => '<module>/default/create',
                '<module:\w+>/<id:\d+>/update' => '<module>/default/update',
                '<module:\w+>/<id:\d+>/delete' => '<module>/default/delete',
                '<module:\w+>/<controller:\w+>/<id>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
		'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation'=> true,
                ],
            ],
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
    ],
    'params' => $params,
];
