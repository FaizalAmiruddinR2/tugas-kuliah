<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = 'Update Customer: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body">
		<div class="customer-update">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
	</div>
</div>
