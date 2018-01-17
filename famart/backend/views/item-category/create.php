<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ItemCategory */

$this->title = 'Create Item Category';
$this->params['breadcrumbs'][] = ['label' => 'Item Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<div class="item-category-create">


		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</div>
</div>
