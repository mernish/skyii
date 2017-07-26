<?php

namespace common\helpers;

/**
 * Class ArrayHelper
 * @package common\helpers
 */
class ArrayHelper extends \yii\helpers\ArrayHelper
{
    public static function jsonToArray($input=null)
    {
        $output = null;
        if(!empty($input)) {
            $output = is_array($input) ? $input : json_decode($input, true);
        }

        return $output;
    }
}
