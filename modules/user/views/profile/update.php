<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modules\user\models\User */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Update User';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'User';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?= Html::errorSummary($model)?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'username') ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?php
                echo Html::submitButton(Yii::t('user', 'Update'), [
                    'class' => 'btn btn-success',
                    'name' => 'signup-button'])
                ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
