<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this  yii\web\View */
/* @var $model modules\user\models\BizRule */
/* @var $form ActiveForm */
?>
<?= Html::errorSummary($model)?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
            <?= $form->field($model, 'className')->textInput() ?>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
</div>
<div class="box-footer">
    <?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
    ?>
</div>
<?php ActiveForm::end(); ?>
