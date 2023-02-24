<?php

namespace app\controllers;

use app\models\logical\ProjectParams;
use Yii;
use app\models\forms\UserIpForm;
use yii\bootstrap5\ActiveForm;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

class ProjectParamsController extends Controller
{
    /**
     * @throws HttpException
     */
    public function actionSetShowUserIp(): array
    {
        $form = new UserIpForm();

        if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post()))
        {
            if ($form->validate()) {
                ProjectParams::setShowUserIpNotes($form->showUserIpNotes);
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($form);
        }

        throw new HttpException(404, 'Страница не существует');
    }
}
