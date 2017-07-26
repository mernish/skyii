<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use modules\user\components\RouteRule;
use modules\user\AutocompleteAsset;
use yii\helpers\Json;
use modules\user\components\Configs;

/* @var $this yii\web\View */
/* @var $model modules\user\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context modules\user\controllers\AuthItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Configs::authManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source
    });
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>
<?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>
                <?= $form->field($model, 'data')->textarea(['rows' => 5]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button'])
        ?>
    </div>
<?php ActiveForm::end(); ?>
