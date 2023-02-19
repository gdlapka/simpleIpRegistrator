<?php

use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;
use app\models\VisitSearch;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var VisitSearch $searchModel */
/** @var ArrayDataProvider $provider */
/** @var array $columns */

$this->title = 'IP регистратор';
?>

<div class="main-page-content">

    <?php Pjax::begin([
        'id' => 'visit-search-container',
        'timeout' => false,
        'enablePushState' => false,
    ]); ?>

        <?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]]]); ?>

            <?= $form->field($searchModel, 'showUserIpNotes')->checkbox() ?>

        <?php ActiveForm::end(); ?>

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
