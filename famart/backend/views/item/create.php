<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<div class="item-create">


		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>
</div>
