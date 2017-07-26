<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\user\models\AuthItem */
/* @var $context modules\user\controllers\AuthItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name .' | ' . Yii::t('user', 'Update ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
$this->params['page_title'] = 'Permissions';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
    </div>
</div>
