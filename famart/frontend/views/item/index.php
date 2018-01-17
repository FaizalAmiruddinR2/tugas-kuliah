<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\LinkPager;

$this->title = 'Item';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

$count = $dataProvider->getCount();

?>
<div class="item-index">
    <p><?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ])?></p>

<?php if($count==0):?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Alert!</h4>
            No data Found.
        </div>
    </div>
</div>
<?php else : ?>
<div class="row">
    <?php foreach ($dataProvider->getModels() as $model) : ?>
    <div class="col-md-3">
        <div class="thumbnail"> 
            <img alt="<?= $model->name ?>" src="<?= Url::to('@web/../../backend/web/uploads/'.$model->photo)?>" style="width: 100%; height: 200px;">
            <div class="caption"> 
                <h3><?= strlen($model->name) > 20 ? substr($model->name, 0, 17).'...' : $model->name ?></h3> 
                <div class="row">
                    <div class="col-md-6">
                        <p>Price : <?= Yii::$app->formatter->asCurrency($model->price) ?></p>
                        <p>Stock : <?= Yii::$app->formatter->asDecimal($model->stock) ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-6 col-md-6">
                        <a href="<?= Url::to(['view', 'id' => $model->id])?>" class="btn btn-primary pull-right" role="button">Detail</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- /.col -->
    <?php endforeach?>
</div
<?php endif?>

    <p><?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ])?></p>

</div>
