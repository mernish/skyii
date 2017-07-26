<?php

use yii\widgets\DetailView;
use modules\user\components\Helper;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\user\models\User */

$this->title = Html::setTitle($model->username);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
$this->params['page_title'] = 'User';
$this->params['page_type'] = $model->username;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="box">
    <div class="box-header with-border">
        <span>
            <?php echo Html::backButton(); ?>
        </span>
        <span>
            <?php
            if (Helper::checkRoute($controllerId . 'create')) {
                echo Html::a(Yii::t('user', 'Create'), ['create'], ['class' => 'btn btn-primary']);
            }
            ?>
        </span>
        <span>
            <?php
            if (Helper::checkRoute($controllerId . 'update')) {
                echo Html::a(Yii::t('user', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']);
            }
            ?>
        </span>
        <span>
            <?php
            if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
                echo Html::a(Yii::t('user', 'Activate'), ['activate', 'id' => $model->id], [
                    'class' => 'btn btn-info',
                    'data' => [
                        'confirm' => Yii::t('user', 'Are you sure you want to activate this user?'),
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
        </span>
        <span>
            <?php
            if (Helper::checkRoute($controllerId . 'delete')) {
                echo Html::a(Yii::t('user', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </span>
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
                        'email:email',
                        'username',
                        'phone',
                        'dob',
                        'anniversary_date',
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
