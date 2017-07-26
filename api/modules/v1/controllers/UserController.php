<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use common\components\Response;
use api\modules\v1\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;
use yii\filters\RateLimiter;

class UserController extends ActiveController
{
    public $modelClass = '\api\modules\v1\models\User';

    public function behaviors()
    {
        return [
            'rateLimiter' => [
                'class' => RateLimiter::className(),
                'enableRateLimitHeaders' =>true,
            ],
            'authenticator' => [
                'class' => QueryParamAuth::className(),
                'except' => ['register','login'],
            ],
        ];
    }
    
    public function actionIndex()
    {
        return [
            'user_name' => 'Test',
            'user_email' => 'test@test.com',
        ];
    }
    
    public function actionShow()
    {
        return 'user test';
    }
}
