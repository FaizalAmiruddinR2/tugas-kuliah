<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Order Item'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'order.id',
                'label' => 'Order'
            ],
        [
                'attribute' => 'item.name',
                'label' => 'Item'
            ],
        'qty',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
