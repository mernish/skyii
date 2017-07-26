<?php

use yii\helpers\Json;
use yii\web\YiiAsset;
use modules\user\AnimateAsset;
use common\helpers\ArrayHelper;
use common\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\user\models\Assignment */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('user', 'Assignment') . ' : ' . $userName;
$this->params['breadcrumbs'][] = $userName;
$this->params['page_title'] = 'Assignment';
$this->params['page_type'] = 'view';

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <span>
                    <?php echo Html::backButton(); ?>
                </span>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-sm-5">
                    <input class="form-control search" data-target="available" placeholder="<?=Yii::t('user', 'Search for available');?>">
                    <select multiple size="20" class="form-control list" data-target="available"></select>
                </div>
                <div class="col-sm-1">
                    <br><br>
                    <?=Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => (string) $model->id], [
                        'class' => 'btn btn-success btn-assign',
                        'data-target' => 'available',
                        'title' => Yii::t('user', 'Assign'),
                    ]);?><br><br>
                    <?=Html::a('&lt;&lt;' . $animateIcon, ['revoke', 'id' => (string) $model->id], [
                        'class' => 'btn btn-danger btn-assign',
                        'data-target' => 'assigned',
                        'title' => Yii::t('user', 'Remove'),
                    ]);?>
                </div>
                <div class="col-sm-5">
                    <input class="form-control search" data-target="assigned" placeholder="<?=Yii::t('user', 'Search for assigned');?>">
                    <select multiple size="20" class="form-control list" data-target="assigned"></select>
                </div>
            </div>
        </div>
    </div>
</div>
