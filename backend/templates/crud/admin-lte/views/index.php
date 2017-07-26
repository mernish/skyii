<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$moduleName = $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))));

echo "<?php\n";
?>

use <?= $generator->indexWidgetType === 'grid' ? "kartik\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>
use common\helpers\Html;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Html::setTitle(<?= $moduleName ?>);
$this->params['breadcrumbs'][] = <?= $moduleName ?>;
$this->params['page_title'] = <?= $moduleName ?>;
$this->params['page_type'] = 'list';
?>
<div class="row">
    <div class="col-xs-12">
<?php if(!empty($generator->searchModelClass)): ?>
<?= "        <?php " . ($generator->indexWidgetType === 'grid' ? "//" : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>
        <div class="box">
            <div class="box-body">

<?php if ($generator->indexWidgetType === 'grid'): ?>
                    <?= "<?= " ?>GridView::widget([
                        'id' => <?= strtolower($generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass)) .'-datatable')) ?>,
                        'dataProvider' => $dataProvider,
                        'tableOptions' => ['class' => 'vertical-middle'],
                        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n                        'columns' => [\n" : "'columns' => [\n"; ?>
                            //[
                                //'class' => 'kartik\grid\CheckboxColumn',
                                //'width' => '20px',
                            //],
                            [
                                'class' => 'kartik\grid\SerialColumn',
                                'width' => '30px',
                            ],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "                            '" . $name . "',\n";
        } else {
            echo "                            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if($column->name == 'status') {
            echo '                            [
                                \'attribute\' => \''.$column->name.'\',
                                \'value\' => function($searchModel) {
                                    return $searchModel->state;
                                },
                             ],' ."\n";
        } else if ($column->name == 'id') {
            echo "                            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else if($column->name == 'created_by' || $column->name == 'updated_by') {
                echo '                             [
                                \'attribute\' => \''.$column->name.'\',
                                \'value\' => function($searchModel) {
                                    return isset($searchModel->'.Inflector::variablize($column->name).'->username) ? $searchModel->'.Inflector::variablize($column->name).'->username : null;
                                },
                             ],' ."\n";
        } else if($column->name == 'created_at' || $column->name == 'updated_at') {
            echo "                            '" . $column->name . ":date',\n";
        } else {
            if (++$count < 6) {
                echo "                            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
            } else {
                echo "                            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
            }
        }
    }
}
?>

                            [
                                'class' => '\kartik\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                            ],
                        ],
                        'responsive' => true,
                        'hover' => true,
                        'pjax' => <?= $generator->enablePjax ? 'true' : 'false' ?>,
                        'showPageSummary' => false,
                        'exportConfig' => [
                            GridView::CSV => [
                                'label' => 'CSV',
                                'icon' => 'floppy-open',
                                'iconOptions' => ['class' => 'text-primary'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => <?= strtolower($generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass)) .'-list')) ?>,
                                'alertMsg' => 'The CSV export file will be generated for download.',
                                'options' => ['title' => 'Comma Separated Values'],
                                'mime' => 'application/csv',
                                'config' => [
                                    'colDelimiter' => ",",
                                    'rowDelimiter' => "\r\n",
                                ]
                            ],
                            GridView::TEXT => [
                                'label' => 'Text',
                                'icon' => 'floppy-save',
                                'iconOptions' => ['class' => 'text-muted'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => <?= strtolower($generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass)) .'-list')) ?>,
                                'alertMsg' => 'The TEXT export file will be generated for download.',
                                'options' => ['title' => 'Tab Delimited Text'],
                                'mime' => 'text/plain',
                                'config' => [
                                    'colDelimiter' => "\t",
                                    'rowDelimiter' => "\r\n",
                                ]
                            ],
                            GridView::EXCEL => [
                                'label' => 'Excel',
                                'icon' => 'floppy-remove',
                                'iconOptions' => ['class' => 'text-success'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => <?= strtolower($generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass)) .'-list')) ?>,
                                'alertMsg' => 'The EXCEL export file will be generated for download.',
                                'options' => ['title' => 'Microsoft Excel 95+'],
                                'mime' => 'application/vnd.ms-excel',
                                'config' => [
                                    'worksheet' => 'ExportWorksheet',
                                    'cssFile' => ''
                                ]
                            ],
                            GridView::PDF => [
                                'label' => 'PDF',
                                'icon' => 'floppy-disk',
                                'iconOptions' => ['class' => 'text-danger'],
                                'showHeader' => true,
                                'showPageSummary' => true,
                                'showFooter' => true,
                                'showCaption' => true,
                                'filename' => <?= strtolower($generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass)) .'-list')) ?>,
                                'alertMsg' => 'The PDF export file will be generated for download.',
                                'options' => ['title' => 'Portable Document Format'],
                                'mime' => 'application/pdf',
                                'config' => [
                                    'mode' => 'c',
                                    'format' => 'A4-L',
                                    'destination' => 'D',
                                    'marginTop' => 20,
                                    'marginBottom' => 20,
                                    'cssInline' => '.kv-wrap{padding:20px;}' .
                                        '.kv-align-center{text-align:center;}' .
                                        '.kv-align-left{text-align:left;}' .
                                        '.kv-align-right{text-align:right;}' .
                                        '.kv-align-top{vertical-align:top!important;}' .
                                        '.kv-align-bottom{vertical-align:bottom!important;}' .
                                        '.kv-align-middle{vertical-align:middle!important;}' .
                                        '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                                        '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                                        '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                                    'methods' => [
                                        'SetHeader' => [
                                            ['odd' => 'PDF Header', 'even' => 'Pdf header']
                                        ],
                                        'SetFooter' => [
                                            ['odd' => 'PDF footer', 'even' => 'PDF Footer']
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'Your Title',
                                        'subject' => 'PDF export generated by kartik-v/yii2-grid extension',
                                        'keywords' => 'grid, export, yii2-grid, pdf, skyii'
                                    ],
                                    'contentBefore' => '',
                                    'contentAfter' => ''
                                ]
                            ],
                        ],
                       'striped' => true,
                       'condensed' => true,
                       'responsive' => true,
                       'toolbar' => [
                           [
                               'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) . ' '. Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-default'])
                           ],
                           '{toggleData}',
                           '{export}',
                       ],
                       'layout' => '
                           <div class="box-header with-border">
                               <div class="pull-right">{toolbar}</div>
                           </div>
                           <div>{items}</div>
                           <div>
                               <div class="pull-left">{summary}</div>
                               <div class="pull-right">{pager}</div>
                           </div>
                       ',
                    ]); ?>
<?php else: ?>
    <?= "            <?= " ?>ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => function ($model, $key, $index, $widget) {
                        return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                    },
                ]) ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
