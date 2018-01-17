<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-statistic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'access_time')->textInput(['placeholder' => 'Access Time']) ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => true, 'placeholder' => 'User Ip']) ?>

    <?= $form->field($model, 'user_host')->textInput(['maxlength' => true, 'placeholder' => 'User Host']) ?>

    <?php /* echo $form->field($model, 'path_info')->textInput(['maxlength' => true, 'placeholder' => 'Path Info']) */ ?>

    <?php /* echo $form->field($model, 'query_string')->textInput(['maxlength' => true, 'placeholder' => 'Query String']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
