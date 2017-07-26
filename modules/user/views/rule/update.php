<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model modules\user\models\BizRule */

$this->title = Yii::t('user', 'Update Rule') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
$this->params['page_title'] = 'Rules';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
    </div>
</div>
