<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-order-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Customer Order'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'customer.name',
                'label' => 'Customer'
            ],
        'date',
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
                'attribute' => 'item.name',
                'label' => 'Item'
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
