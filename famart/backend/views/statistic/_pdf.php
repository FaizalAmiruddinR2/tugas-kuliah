<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Statistic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statistic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistic-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Statistic'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'user.username',
                'label' => 'User'
            ],
        'access_time',
        'user_ip',
        'user_host',
        'path_info',
        'query_string',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
