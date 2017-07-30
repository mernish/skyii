<?php

namespace api\models;

use yii\filters\RateLimitInterface;

/**
 * Class User
 * @package api\models
 */
class User extends \modules\user\models\User implements RateLimitInterface
{
    public $rateLimit = 2;
    public $durationInSeconds = 1;
    
    /**
     * Filter out some fields, best used when you want to inherit the parent implementation
     * and blacklist some sensitive fields.
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();
        // remove fields that contain sensitive information
        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);
        
        return $fields;
    }
    
    /**
     * @param \yii\web\Request $request
     * @param \yii\base\Action $action
     * @return array
     */
    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, $this->durationInSeconds]; // $rateLimit requests per second
    }
    
    /**
     * @param \yii\web\Request $request
     * @param \yii\base\Action $action
     * @return array
     */
    public function loadAllowance($request, $action)
    {
        return [$this->allowance, $this->allowance_updated_at];
    }
    
    /**
     * @param \yii\web\Request $request
     * @param \yii\base\Action $action
     * @param int $allowance
     * @param int $timestamp
     */
    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $this->allowance = $allowance;
        $this->allowance_updated_at = $timestamp;
        $this->save();
    }
}
