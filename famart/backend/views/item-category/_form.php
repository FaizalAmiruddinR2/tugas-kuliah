<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ItemCategory */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Item', 
        'relID' => 'item', 
        'value' => \yii\helpers\Json::encode($model->items),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ItemCategory', 
        'relID' => 'item-category', 
        'value' => \yii\helpers\Json::encode($model->itemCategories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="item-category-form">

    <?php $form = ActiveForm::begin(); ?>

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
                <?= $form->field($model, 'parent_category')->widget(\kartik\widgets\Select2::classname(), [
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
