<?php

namespace common\helpers;

use Yii;
use yii\web\Response;
use common\helpers\Html;

class Error
{
    public static function invalidRequest()
    {
        return 'Invalid request';
    }

    public static function notFound()
    {
        return 'The requested page does not exist.';
    }

    public static function throwException($e)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = [
                'status' => 'exception',
                'msg' => $e->getMessage(),
            ];
            Yii::$app->end();
        } else {
            echo $e->getMessage();
        }
    }

    /**
     * Response after ajax validation on a model
     *
     * @param $model
     * @return array
     */
    public static function ajaxForm($model)
    {
        $errors = $model->getErrors();

        foreach ($errors as $attribute => $messages) {
            $result[Html::getInputId($model, $attribute)] = $messages;
        }

        return [
            'status' => 'error',
            'errors' => $result,
        ];
    }
}
