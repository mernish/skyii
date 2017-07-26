<?php

use yii\bootstrap\ActiveForm;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Html::setTitle('Update User');
$this->params['breadcrumbs'][] = 'Update User';
$this->params['page_title'] = 'User';
$this->params['page_type'] = 'update';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model, 'type' => ucwords($this->params['page_type'])]); ?>
        </div>
    </div>
</div>
