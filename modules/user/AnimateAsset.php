<?php

namespace modules\user;

use yii\web\AssetBundle;

/**
 * Class AnimateAsset
 * @package modules\user
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@modules/user/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'animate.css',
    ];
}
