<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this  yii\web\View */
/* @var $model modules\user\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel modules\user\models\search\BizRule */

$this->title = Yii::t('user', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'Rules';
$this->params['page_type'] = 'list';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a(Yii::t('user', 'Create Rule'), ['create'], ['class' => 'btn btn-success']) ?>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label' => Yii::t('user', 'Name'),
                        ],
                        ['class' => 'yii\grid\ActionColumn',],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
