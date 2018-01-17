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
<div class="box">
    <div class="box-body">
        <div class="order-item-view container-fluid">

        <div class="row">
            <div class="col-sm-9">
                
            </div>
            <div class="col-sm-3" style="margin-top: 15px">
        <?=                 
                 Html::a('<i class="fa fa-file-pdf-o"></i> ' . 'PDF', 
                    ['pdf', 'order_id' => $model->order_id, 'item_id' => $model->item_id],
                    [
                        'class' => 'btn btn-danger',
                        'target' => '_blank',
                        'data-toggle' => 'tooltip',
                        'title' => 'Will open the generated PDF file in a new window'
                    ]
                )?>
                        
                <?= Html::a('<i class="fa fa-pencil"></i> ' . 'Update', ['update', 'order_id' => $model->order_id, 'item_id' => $model->item_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-trash"></i> ' . 'Delete', ['delete', 'order_id' => $model->order_id, 'item_id' => $model->item_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </div>
        </div>

        <div class="row">
    <?php 
        $gridColumn = [
            [
            'attribute' => 'order.id',
            'label' => 'Order',
        ],
        [
            'attribute' => 'item.name',
            'label' => 'Item',
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
    </div>
</div>
