<?php

namespace modules\user;

use Yii;
use yii\helpers\Inflector;

/**
 *
 * Use [[\yii\base\Module::$controllerMap]] to change property of controller.
 *
 * ```
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => 'modules\user\controllers\AssignmentController',
 *         'userClassName' => 'app\models\User',
 *         'idField' => 'id'
 *     ]
 * ],
 * ```
 * @property string $mainLayout Main layout using for module. Default to layout of parent module.
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $defaultRoute = 'user';
    
    /**
     * @var string Main layout using for module. Default to layout of parent module.
     */
    public $mainLayout = '@backend/views/layouts/main.php';
    
    /**
     * @var array
     */
    private $_coreItems = [
        'user' => 'Users',
        'assignment' => 'Assignments',
        'role' => 'Roles',
        'permission' => 'Permissions',
        'route' => 'Routes',
        'rule' => 'Rules',
    ];
    
    /**
     * @var string Default url for breadcrumb
     */
    public $defaultUrl;

    /**
     * @var string Default url label for breadcrumb
     */
    public $defaultUrlLabel;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['user'])) {
            Yii::$app->i18n->translations['user'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@modules/user/messages',
            ];
        }

        if (class_exists('yii\jui\JuiAsset')) {
            Yii::$container->set('modules\user\AutocompleteAsset', 'yii\jui\JuiAsset');
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /* @var $action \yii\base\Action */
            $view = $action->controller->getView();
            
            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: Yii::t('user', 'Admin')),
                'url' => ['/' . ($this->defaultUrl ?: $this->uniqueId)],
            ];
            return true;
        }
        return false;
    }
}
