<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerOrder */

$this->title = 'Update Customer Order: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body">
		<div class="customer-order-update">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
	</div>
</div>
