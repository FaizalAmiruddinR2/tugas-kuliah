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
<div class="box">
    <div class="box-body">
        <div class="item-view container-fluid">

        <div class="row">
            <div class="col-sm-7">
                
            </div>
            <div class="col-sm-5" style="margin-top: 15px">
        <?=                 
                 Html::a('<i class="fa fa-file-pdf-o"></i> ' . 'PDF', 
                    ['pdf', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger',
                        'target' => '_blank',
                        'data-toggle' => 'tooltip',
                        'title' => 'Will open the generated PDF file in a new window'
                    ]
                )?>
                        
                <?= Html::a('<i class="fa fa-pencil"></i> ' . 'Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-file-image-o" aria-hidden="true"></i> ' . 'New Photo', ['update-photo', 'id' => $model->id], ['title' => 'Upload new Photo.', 'class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-trash"></i> ' . 'Delete', ['delete', 'id' => $model->id], [
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
            ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'photo',
            'format' => 'html',
            'value' => function($model) {
                return Html::img('@web/uploads/'.$model->photo, ['alt' => $model->name, 'style' => 'height: 200px;']);
            }
        ],
        'name',
        'stock',
        'price:currency',
        [
            'attribute' => 'category.name',
            'label' => 'Category',
        ],
        [
            'attribute' => 'createdBy.username',
            'label' => 'Created By'
        ],
        [
            'attribute' => 'updatedBy.username',
            'label' => 'Updated By'
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
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-item']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order Item'),
            ],
                'columns' => $gridColumnOrderItem
        ]);
    }
    ?>
        </div>
                    </div>
    </div>
</div>
