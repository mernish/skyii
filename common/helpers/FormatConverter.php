<?php

namespace common\helpers;

/**
 * Class FormatConverter
 * @package common\helpers
 */
class FormatConverter extends \yii\helpers\FormatConverter
{
    public static function date($date, $format = 'Y-m-d')
    {
        return date($format, strtotime($date));
    }

    public static function dateFormatList()
    {
        return [
            'j/n/y' => '31/12/' . date('y'),
            'j-n-y' => '31-12-' . date('y'),
            'j/n/Y' => '31/12/' . date('Y'),
            'j-n-Y' => '31-12-' . date('Y'),
            'd/m/y' => '31/12/' . date('y'),
            'd-m-y' => '31-12-' . date('y'),
            'd/m/Y' => '31/12/' . date('Y'),
            'd-m-Y' => '31-12-' . date('Y'),
            'Y/m/d' => date('Y') . '/12/31',
            'Y-m-d' => date('Y') . '-12-31',
            'd F, Y' => '01 April, ' . date('Y'),
            'F d, Y' => 'April 01, '. date('Y'),
        ];
    }

    public static function currencyList()
    {
        return [
            'USD' => 'USD ($)',
            'GBP' => 'GBP (&pound;)',
            'EUR' => 'EUR (&euro;)',
            'INR' => 'INR (&#x20B9;)',
        ];
    }
}
