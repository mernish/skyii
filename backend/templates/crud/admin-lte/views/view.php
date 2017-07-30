<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\widgets\DetailView;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = Html::setTitle($model-><?= $generator->getNameAttribute() ?>);
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $model-><?= $generator->getNameAttribute() ?>;
$this->params['page_title'] = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['page_type'] = 'view';
?>
<div class="box">
    <div class="box-header with-border">
        <span>
            <?= "<?= " ?>Html::backButton() ?>
        </span>
        <span>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('List') ?>, ['index'], ['class' => 'btn btn-info']) ?>
        </span>
        <span>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        </span>
        <span>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                    'method' => 'post',
                ],
            ]) ?>
        </span>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-11">
<?= "                <?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "                        '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if($column->name == 'status') {
            echo '                         [
                            \'attribute\' => \''.$column->name.'\',
                            \'value\' => $model->state,
                         ],' ."\n";
        } else if($column->name == 'created_by' || $column->name == 'updated_by') {
            echo '                         [
                            \'attribute\' => \''.$column->name.'\',
                            \'value\' => isset($model->'.Inflector::variablize($column->name).'->username) ? $model->'.Inflector::variablize($column->name).'->username : null,
                         ],' ."\n";
        } else if($column->name == 'created_at' || $column->name == 'updated_at') {
            echo "                        '" . $column->name . ":date',\n";
        } else {
            echo "                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
    </div>
</div>
