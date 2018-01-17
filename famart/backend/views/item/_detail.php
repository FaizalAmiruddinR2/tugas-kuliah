<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

?>
<div class="item-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
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
</div>