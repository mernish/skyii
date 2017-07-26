<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $baseUrl = '@vendor/almasaeed2010/adminlte';
    public $css = [];
    public $js = [];
    
    public $depends = [
        // Disabling this will stop the delete button functionality
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];

    public function init()
    {
        parent::init();
    }
}
