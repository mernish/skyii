<?php

namespace common\helpers;

use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class Validator extends \yii\validators\Validator
{
    public static function ajaxModel($model, $sendResponse = true)
    {
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $errors = ActiveForm::validate($model);
            if ($sendResponse) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode($errors);
                Yii::$app->end();
            } else {
                if (empty($errors)) {
                    $returnData = ['status' => 'success'];
                } else {
                    $returnData = ['status' => 'error', 'errors' => $errors];
                }
                
                return $returnData;
            }
        }
    }
}
