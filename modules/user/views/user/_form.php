<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\user\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //echo Html::errorSummary($model)?>
<?php $form = ActiveForm::begin(['id' => 'form-user-create']); ?>
<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'phone') ?>
            <div class="form-group field-user-dob">
                <label class="control-label" for="user-dob">Dob</label>
                <?php
                echo DatePicker::widget([
                    'name' => 'User[dob]',
                    'value' => $model->dob ? Yii::$app->formatter->asDate($model->dob, 'dd-MMM-yyyy') : null,
                    'type' => DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <?php
    echo Html::submitButton(Yii::t('user', $type), [
        'class' => 'btn btn-success',
        'name' => 'button-user-create'
    ]);
    ?>
</div>
<?php ActiveForm::end(); ?>
