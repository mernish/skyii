<?php

use yii\grid\GridView;
use yii\web\View;
use common\helpers\Html;
use modules\user\components\Helper;
use modules\user\components\RouteRule;
use modules\user\components\Configs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel modules\user\models\search\AuthItem */
/* @var $context modules\user\controllers\AuthItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('user', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = $labels['Items'];
$this->params['page_type'] = 'list';

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a(Yii::t('user', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?>
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
                        [
                            'attribute' => 'description',
                            'label' => Yii::t('user', 'Description'),
                        ],
                        [
                            'attribute' => 'ruleName',
                            'label' => Yii::t('user', 'Rule Name'),
                            'filter' => $rules
                        ],
                        ['class' => 'yii\grid\ActionColumn',],
                    ],
                ])
                ?>
            </div>
        </div>
    </div>
</div>
