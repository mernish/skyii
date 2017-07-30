<?php
return [
    'id' => 'skyii-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'modules\user\models\User',
        ],
    ],
];
