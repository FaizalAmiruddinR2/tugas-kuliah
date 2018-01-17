<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model common\models\Item */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'OrderItem', 
        'relID' => 'order-item', 
        'value' => \yii\helpers\Json::encode($model->orderItems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'stock')->textInput(['placeholder' => 'Stock']) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'price')->widget(MaskMoney::classname()) ?>

        </div>
    </div>
    <?php if(Yii::$app->controller->action->id === 'create'): ?>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'upload_photo')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'placeholder' => 'Photo'],
                ])?>

        </div>
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\ItemCategory::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Item category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

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
