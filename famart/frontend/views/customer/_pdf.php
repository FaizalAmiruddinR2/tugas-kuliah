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
<div class="customer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Customer'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'user.username',
                'label' => 'User'
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Customer Order'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnCustomerOrder
    ]);
}
?>
    </div>
</div>
