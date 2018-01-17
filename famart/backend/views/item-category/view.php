<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\ItemCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <div class="item-category-view container-fluid">

        <div class="row">
            <div class="col-sm-9">
                
            </div>
            <div class="col-sm-3" style="margin-top: 15px">
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
        'name',
        [
            'attribute' => 'parentCategory.name',
            'label' => 'Parent Category',
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
    if($providerItem->totalCount){
        $gridColumnItem = [
            ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
            'name',
            'stock',
            'price',
            'photo',
                    ];
        echo Gridview::widget([
            'dataProvider' => $providerItem,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-item']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Item'),
            ],
                'columns' => $gridColumnItem
        ]);
    }
    ?>
        </div>
                            
        <div class="row">
    <?php
    if($providerItemCategory->totalCount){
        $gridColumnItemCategory = [
            ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
            'name',
                    ];
        echo Gridview::widget([
            'dataProvider' => $providerItemCategory,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-item-category']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Item Category'),
            ],
                'columns' => $gridColumnItemCategory
        ]);
    }
    ?>
        </div>
            </div>
    </div>
</div>
