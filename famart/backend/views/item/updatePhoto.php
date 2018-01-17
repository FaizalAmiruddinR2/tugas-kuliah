<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Update Item: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update Photo';
?>
<div class="box">
	<div class="box-body">
		<div class="item-update">

	    <?= $this->render('_formUpload', [
	        'model' => $model,
	    ]) ?>

	</div>
	</div>
</div>
