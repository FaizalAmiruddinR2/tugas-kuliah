<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Item'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'stock',
        'price',
        'photo',
        [
                'attribute' => 'category.name',
                'label' => 'Category'
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerOrderItem->totalCount){
    $gridColumnOrderItem = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'order.id',
                'label' => 'Order'
            ],
                'qty',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrderItem,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Order Item'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnOrderItem
    ]);
}
?>
    </div>
</div>
