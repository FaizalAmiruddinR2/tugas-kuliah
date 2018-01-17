<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('ItemCategory'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Item'),
        'content' => $this->render('_dataItem', [
            'model' => $model,
            'row' => $model->items,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Item Category'),
        'content' => $this->render('_dataItemCategory', [
            'model' => $model,
            'row' => $model->itemCategories,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
