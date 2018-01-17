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
<div class="item-category-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Item Category'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Item'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Item Category'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnItemCategory
    ]);
}
?>
    </div>
</div>
