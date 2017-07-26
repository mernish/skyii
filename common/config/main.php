<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cacheFileSuffix' => '.bin',
            'cachePath' => '@backend/runtime/cache',
            'dirMode' =>  '0775',
            'directoryLevel' =>  '1',
            'keyPrefix' => 'skyii_',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => 'http://path/to'
        ],
        'settings' => [
            'class' => 'modules\settings\components\Settings'
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ],
        'user' => [
            'class' => 'modules\user\Module',
            //'layout' => 'modules/user/views/layouts/main',
        ],
		'formatter' => [
           'dateFormat' => 'php:d-M-Y',
           'datetimeFormat' => 'php:Y-m-d H:i:s',
           'timeFormat' => 'php:H:i:s',
           'timeZone' => 'Europe/Berlin', // time zone
           'defaultTimeZone' => 'Asia/Kolkata', // time zone
      	],
    ],
];
