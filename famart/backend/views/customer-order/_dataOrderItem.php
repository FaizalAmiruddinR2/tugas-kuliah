<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->orderItems,
        'key' => function($model){
            return ['order_id' => $model->order_id, 'item_id' => $model->item_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'item.name',
                'label' => 'Item'
            ],
        'qty',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'order-item'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
