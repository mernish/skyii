<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

$totalColumns = count($generator->getColumnNames());
//Deduct the columns that we don't display on form.
// Status, created_by, updated_by, created_at, updated_at, id
$hiddenColumns = 6;
$visibleColumns = $totalColumns - $hiddenColumns;

echo "<?php\n";
?>

use yii\widgets\ActiveForm;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>
<?= "<?php " ?>//echo Html::errorSummary($model); ?>
<div class="box-body">
    <div class="row">
        <?= "<?php " ?>$form = ActiveForm::begin(); ?>
<?php if ($visibleColumns <= 3) : ?>
            <div class="col-sm-4 col-sm-offset-4">
<?php else : ?>
            <div class="col-sm-12">
                <div class="col-sm-6">
<?php endif; ?>
<?php
$i = 0;
$half = ceil($visibleColumns / 2);
foreach ($generator->getColumnNames() as $attribute) {
    if($i == $half) {
echo '                </div>'."\n";
echo '                <div class="col-sm-6">'."\n";
    }
    if (in_array($attribute, $safeAttributes)) {
        if ($attribute == 'id' || $attribute == 'status' || $attribute == 'created_by' || $attribute == 'updated_by' || $attribute == 'created_at' || $attribute == 'updated_at') {
echo '';
        } else {
echo "                    <?= " . $generator->generateActiveField($attribute) . " ?>\n";
$i++;
        }
    }
}
?>
                </div>
            </div>
            <div class="pull-right">
                <div class="col-md-12">
                    <div class="box-footer <?php echo $visibleColumns <= 3 ? 'text-center' : '' ?>">
                        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        <?= "<?php " ?>ActiveForm::end(); ?>
    </div>
</div>
