<?php

namespace modules\user\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\base\UserException;
use yii\mail\BaseMailer;
use modules\user\models\form\Login;
use modules\user\models\form\PasswordResetRequest;
use modules\user\models\form\ResetPassword;
use modules\user\models\form\Signup;
use modules\user\models\form\ChangePassword;
use modules\user\models\User;
use modules\user\models\search\User as UserSearch;
use common\models\LoginForm;

/**
 * User controller
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'view',
                            'update'
                        ],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionView()
    {
        $id = Yii::$app->user->identity->getId();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate()
    {
        $id = Yii::$app->user->identity->getId();
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($model->validate()) {
                $model->username = $model->username;
                $model->email = $model->email;
                $model->setPassword($model->password);
                $model->generateAuthKey();
                if ($model->save()) {
                    return $this->redirect(['view']);
                }
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', ['model' => $model]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
