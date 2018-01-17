<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'order_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\CustomerOrder::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Customer order'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'item_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Item::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Item'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'qty')->textInput(['placeholder' => 'Qty']) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-info">
                <p><span style="color: red;">*</span> Field Must be Filled</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
