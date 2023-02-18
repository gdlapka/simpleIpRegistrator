<?php

return [
    'jsCompressor' => 'terser {from} -o {to}',
    'cssCompressor' => 'yuicompressor --type css {from} -o {to}',
    'deleteSource' => false,
    'bundles' => [
        app\assets\AppAsset::class,
        yii\web\YiiAsset::class,
        yii\web\JqueryAsset::class,
        yii\bootstrap5\BootstrapPluginAsset::class,
        yii\grid\GridViewAsset::class,
        kartik\bs5dropdown\DropdownAsset::class,
        kartik\grid\GridViewAsset::class,
        kartik\grid\GridExportAsset::class,
        kartik\grid\GridResizeColumnsAsset::class,
        kartik\dialog\DialogBootstrapAsset::class,
        kartik\dialog\DialogAsset::class,
        kartik\dialog\DialogYiiAsset::class,
    ],
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'js/all-{hash}.js',
            'css' => 'css/all-{hash}.css',
        ],
    ],
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];
