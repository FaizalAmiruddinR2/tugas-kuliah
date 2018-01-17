<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = 'Update Order Item: ' . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body">
		<div class="order-item-update">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
	</div>
</div>
