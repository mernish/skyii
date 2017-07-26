<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var modules\user\models\AuthItem $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['page_title'] = 'Rules';
$this->params['page_type'] = 'view';
?>
<div class="auth-item-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('user', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?php
        echo Html::a(Yii::t('user', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('user', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);
        ?>
    </p>
    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'className',
        ],
    ]);
    ?>
</div>
