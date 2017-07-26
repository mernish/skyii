<?php

namespace common\components;

use Yii;

/**
 * This extension of the Request component can be used to replace parts of the requested url.
 * 
 * It has to be enabled in the 'components' area of the main configuration files for the front- and backend:
 * 
 * eg: If you want to replace '/frontend/web' from the url's, put this in
 *     frontend/config.main.php in the 'components' section.
 * 
 *      'request'=>[
 *          'class' => 'common\components\Request',
 *          'web'=> '/frontend/web'
 *      ]
 *
 */
class Request extends \yii\web\Request
{
    public $noCsrfRoutes = [];
    public $web;
    public $adminUrl;

    /**
     * Takes the base url from the parent class and replaces the 'web' url that
     * you defined with an empty string:
     * 
     *  eg: the 'web' url is set to 'frontend/web'
     *      www.your-domain.com/frontend/web becomes www.your-domain.com/
     * 
     * @return  string
     */
    public function getBaseUrl()
    {
        return str_replace($this->web, '', parent::getBaseUrl()) . $this->adminUrl;
    }


    /**
     * This function ensures that www.your-domain.com/admin (without trailing slash) will not
     * throw a 404 error
     * 
     * @return  string
     */
    public function resolvePathInfo()
    {
        if ($this->getUrl() === $this->adminUrl) {
            return '';
        } else {
            return parent::resolvePathInfo();
        }
    }

    public function validateCsrfToken()
    {
        if($this->enableCsrfValidation && in_array(Yii::$app->getUrlManager()->parseRequest($this)[0], $this->noCsrfRoutes)){
            return true;
        }

        return parent::validateCsrfToken();
    }
}
