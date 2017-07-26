<?php

namespace modules\user;

use yii\web\AssetBundle;

/**
 * Class AutocompleteAsset
 * @package modules\user
 */
class AutocompleteAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@modules/user/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'jquery-ui.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'jquery-ui.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
