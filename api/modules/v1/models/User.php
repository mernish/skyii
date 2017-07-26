<?php

namespace api\modules\v1\models;

/**
 * Class User
 * @package api\modules\v1\models
 */
class User extends \api\models\User
{
    /**
     * @param array $fields
     * @return bool
     */
    public static function checkUserExists($fields = [])
    {
        try {
            if(!empty($fields)) {
                $query = User::find();
                
                if(isset($field['mobile'])){
                    $query->andWhere(['mobile' => $fields['mobile']]);
                }
                
                if(isset($field['email'])){
                    $query->andWhere(['email' => $fields['email']]);
                }
                
                $users = $query->one();
                if(!empty($users)) {
                    return false;
                }
            } else {
                return true;
            }
        } catch (\Exception $ex) {
            return false;
        }
    }
}
