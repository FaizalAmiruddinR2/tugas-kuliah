<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ItemCategory */

$this->title = 'Update Item Category: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body">
		<div class="item-category-update">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
	</div>
</div>
