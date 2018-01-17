<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <div class="customer-view container-fluid">

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
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'name',
        'email:email',
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]); 
    ?>
        </div>
                        
        <div class="row">
    <?php
    if($providerCustomerOrder->totalCount){
        $gridColumnCustomerOrder = [
            ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                        'date',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerCustomerOrder,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-customer-order']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Customer Order'),
            ],
                'columns' => $gridColumnCustomerOrder
        ]);
    }
    ?>
        </div>
            </div>
    </div>
</div>
