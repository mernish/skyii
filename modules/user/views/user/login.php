<?php

use yii\bootstrap\ActiveForm;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \modules\user\models\form\Login */

$this->title = Html::setTitle('Login');
?>
<style>
    .checkbox label { padding-left: 0; }
</style>
<div class="login-box">
    <div class="login-logo">
        <b>SKYII</b> 0.1
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Email']) ?>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password']) ?>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                </div>
                <div class="col-xs-4">
                    <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
        <?= Html::a('I forgot my password', ['/user/request-password-reset']) ?>
        <br>
        <?= Html::a('Register a new membership', ['/user/signup'], ['class' => 'text-center']) ?>
    </div>
</div>
