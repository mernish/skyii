<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use modules\user\components\Helper;

/* @var $this yii\web\View */
/* @var $model modules\user\models\User */

$this->title = 'Profile | '.$model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'Profile';
$this->params['page_type'] = 'view';

$controllerId = $this->context->uniqueId . '/';
?>
<div class="box">
    <div class="box-header with-border">
        <?php echo Html::a(Yii::t('user', 'Update'), ['update'], ['class' => 'btn btn-success']); ?>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-11">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'username',
                        'email:email',
                        'created_at:date',
                        'status',
                    ],
                ])
                ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
    </div>
</div>
