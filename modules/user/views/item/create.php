<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\user\models\AuthItem */
/* @var $context modules\user\controllers\AuthItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('user', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = $labels['Item'];
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
    </div>
</div>
