<?php

namespace common\helpers;

use yii\web\UploadedFile;
use common\helpers\Url;

/**
 * Class FileHelper
 * @package common\helpers
 */
class FileHelper extends \yii\helpers\FileHelper
{
    public static function upload($options = [])
    {
        $fileObj = empty($options['fileObj']) ? '' : $options['fileObj'];
        $folder = empty($options['folder']) ?: $options['folder'];
        $oldFile = empty($options['oldFile']) ?: $options['oldFile'];

        if(empty($fileObj) || empty($folder)) {
            return null;
        }

        $imageName = time() . '_' . $fileObj->name;
        $path = Url::getMediaPath($folder);
        $fileObj->saveAs($path . $imageName, false);

        if($oldFile) {
            @unlink($path . $oldFile);
        }

        return $imageName;
    }
}
