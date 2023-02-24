<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Visit;
use app\models\VisitSearch;
use app\models\forms\UserIpForm;

class RegistratorController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        Visit::saveCurrent();
        $userIpForm = UserIpForm::create();
        $searchModel = new VisitSearch();
        $provider = $searchModel->search(Yii::$app->request->get(), $userIpForm->showUserIpNotes);
        $columns = $searchModel->columns;
        return $this->render('index', compact(
            'searchModel',
            'provider',
            'columns',
            'userIpForm'
        ));
    }
}
