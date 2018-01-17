<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'CustomerOrder', 
        'relID' => 'customer-order', 
        'value' => \yii\helpers\Json::encode($model->customerOrders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

        </div>
    </div>
    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('CustomerOrder'),
            'content' => $this->render('_formCustomerOrder', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->customerOrders),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
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
