<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<div class="customer-create">


		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>
</div>
