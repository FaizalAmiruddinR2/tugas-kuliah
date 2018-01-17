<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'stock')->textInput(['placeholder' => 'Stock']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true, 'placeholder' => 'Photo']) ?>

    <?php /* echo $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\ItemCategory::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Item category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
