<?php

namespace modules\user\controllers;

use yii\rbac\Item;
use modules\user\controllers\AuthItemController;

/**
 * Class RoleController
 * @package modules\user\controllers
 */
class RoleController extends AuthItemController
{
    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Role',
            'Items' => 'Roles',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_ROLE;
    }
}
