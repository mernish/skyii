<?php

namespace common\helpers;

class Helper
{
    public static function splitName($fullName = null)
    {
        $name = [
            'first_name' => null,
            'last_name' => null
        ];

        if(!empty($fullName)) {
            $fullNameParts = explode(' ', trim($fullName), 2);
            $name['first_name'] = $fullNameParts[0];
            $name['last_name'] = !empty($fullNameParts[1]) ? $fullNameParts[1] : '';
        }

        return $name;
    }
}
