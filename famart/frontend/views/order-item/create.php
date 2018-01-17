<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = 'Create Order Item';
$this->params['breadcrumbs'][] = ['label' => 'Order Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<div class="order-item-create">


		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>
</div>
