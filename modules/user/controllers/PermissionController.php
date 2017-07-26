<?php

namespace modules\user\controllers;

use modules\user\controllers\AuthItemController;
use yii\rbac\Item;

/**
 * PermissionController implements the CRUD actions for AuthItem model.
 *
 */
class PermissionController extends AuthItemController
{

    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_PERMISSION;
    }
}
