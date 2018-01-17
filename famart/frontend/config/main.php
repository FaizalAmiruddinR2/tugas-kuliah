<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'FA-Mart',
    'language' => 'id-ID',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'item/index',
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
        ],
    ],
    'components' => [
        'formatter' => [
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'IDR',
            'defaultTimeZone' => 'Asia/Jakarta',
        ],
        'statistic' => [
            'class' => 'frontend\components\StatisticComponent',
            'on access-page' => ['frontend\components\StatisticComponent', 'statisticHandler'],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'httpOnly' => true,
                'name' => '_frontendUser', // unique for frontend
                'path'=>'/frontend/web'  // correct path for the frontend app.
            ]
        ],
        'session' => [
            'name' => 'advanced-frontend', // unique for frontend
            'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
        
    ],
    'params' => $params,
];
