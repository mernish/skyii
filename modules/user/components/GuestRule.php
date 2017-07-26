<?php

namespace modules\user\components;

use yii\rbac\Rule;

/**
 * Class GuestRule
 * @package modules\user\components
 */
class GuestRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'guest_rule';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        return $user->getIsGuest();
    }
}
