<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var ArrayDataProvider $provider */
/** @var array $columns */

$this->title = 'IP регистратор';
?>

<div class="main-page-content">
    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => $columns,
    ]) ?>
</div>
