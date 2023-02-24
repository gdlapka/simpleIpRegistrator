<?php

use app\models\forms\UserIpForm;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;
use app\models\VisitSearch;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var VisitSearch $searchModel */
/** @var UserIpForm $userIpForm */
/** @var ArrayDataProvider $provider */
/** @var array $columns */

$this->title = 'IP регистратор';
?>

<div class="main-page-content">

    <?php $form = ActiveForm::begin([
        'id' => 'show-user-ip-form',
        'action' => '@web/project-params/set-show-user-ip',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($userIpForm, 'showUserIpNotes')->checkbox() ?>

    <?php ActiveForm::end(); ?>

    <?php Pjax::begin([
        'id' => 'visit-search-container',
        'timeout' => false,
        'enablePushState' => false,
    ]); ?>

        <?= GridView::widget([
            'id' => 'visit-register-grid-view',
            'dataProvider' => $provider,
            'columns' => $columns,
            'filterModel' => $searchModel,
            'export' => false,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
            ],
        ]) ?>

    <?php Pjax::end(); ?>

</div>
