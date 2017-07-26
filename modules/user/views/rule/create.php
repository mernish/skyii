<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model modules\user\models\BizRule */

$this->title = Yii::t('user', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'Rule';
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model]); ?>
        </div>
    </div>
</div>
