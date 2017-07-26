<?php

namespace common\helpers;

use Yii;

/**
 * Class Url
 * @package common\helpers
 */
class Url extends \yii\helpers\Url
{
    public static function getBasePath()
    {
        $basePath = Yii::$app->basePath;
        $basePath = str_replace('api', '', $basePath);
        $basePath = str_replace('frontend', '', $basePath);
        $basePath = str_replace('backend', '', $basePath);

        return $basePath;
    }

    public static function getBaseUrl()
    {
        $absoluteUrl = Yii::$app->getUrlManager()->createAbsoluteUrl('');
        $absoluteUrl = str_replace('/api/web/', '', $absoluteUrl);
        $absoluteUrl = str_replace('/api/web/', '', $absoluteUrl);
        $absoluteUrl = str_replace('/admin', '', $absoluteUrl);

        return $absoluteUrl;
    }

    public static function getMediaPath($name)
    {
        $rootPath = Yii::getAlias('@root');

        return $rootPath . '/media/'.$name.'/';
    }

    public static function getMediaUrl($name, $folderName)
    {
        $return = self::getBaseUrl() . 'media/' . $folderName . '/' . $name;
        if (empty($name) || empty($folderName)) {
            $return = self::getBaseUrl() . 'media/default_user.png';
        }

        return $return;
    }
}
