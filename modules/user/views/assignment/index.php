<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel modules\user\models\search\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('user', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'Assignment';
$this->params['page_type'] = 'list';

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}'
];
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => $columns,
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
