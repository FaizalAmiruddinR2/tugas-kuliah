<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerOrder */

$this->title = 'Create Customer Order';
$this->params['breadcrumbs'][] = ['label' => 'Customer Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<div class="customer-order-create">


		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>
</div>
