<?php

use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \modules\user\models\User */

$this->title = Html::setTitle('Create User');
$this->params['breadcrumbs'][] = 'Create User';
$this->params['page_title'] = 'User';
$this->params['page_type'] = 'create';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <?php echo $this->render('_form', ['model' => $model, 'type' => ucwords($this->params['page_type'])]); ?>
        </div>
    </div>
</div>
