<?php

use yii\grid\GridView;
use yii\web\View;
use common\helpers\Html;
use common\helpers\Url;
use backend\assets\AppAsset;
use modules\user\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel modules\user\models\search\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Html::setTitle('Users');
$this->params['breadcrumbs'][] = 'Users';
$this->params['page_title'] = 'Users';
$this->params['page_type'] = 'list';

AppAsset::register($this);
list($path, $link) = $this->getAssetManager()->publish('@vendor/almasaeed2010/adminlte');

$this->registerCssFile($link.'/plugins/datatables/dataTables.bootstrap.css', ['position' => View::POS_HEAD]);
$this->registerJsFile($link.'/plugins/datatables/jquery.dataTables.min.js', ['position' => View::POS_END]);
$this->registerJsFile($link.'/plugins/datatables/dataTables.bootstrap.min.js', ['position' => View::POS_END]);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'username',
                        'email:email',
                        'created_at:date',
                        [
                            'attribute' => 'status',
                            'value' => function($model) {
                                return $model->status == 0 ? 'Inactive' : 'Active';
                            },
                            'filter' => [
                                0 => 'Inactive',
                                10 => 'Active'
                            ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => Helper::filterActionColumn(['assignment', 'view', 'update', 'activate', 'delete']),
                            'buttons' => [
                                'assignment' => function($url, $model) {
                                    $url = Url::to(['/user/assignment/view', 'id' => $model->id]);
                                    return Html::a('<span class="fa fa-wrench"></span>', $url, [
                                        'title' => 'Assignments',
                                        'aria-label' => 'Assignments',
                                    ]);
                                },
                                'activate' => function($url, $model) {
                                    if ($model->status == 10) {
                                        return '';
                                    }
                                    $options = [
                                        'title' => Yii::t('user', 'Activate'),
                                        'aria-label' => Yii::t('user', 'Activate'),
                                        'data-confirm' => Yii::t('user', 'Are you sure you want to activate this user?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                                },
                            ],
                            /*'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'assignment') {
                                    $url ='/user/'.$model->id.'/assignment';
                                    return $url;
                                }
                            }*/
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
