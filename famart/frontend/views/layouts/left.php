<?php
use yii\helpers\Url;
?>

<aside class="main-sidebar">

    <section class="sidebar">
        
        <?php if(!Yii::$app->user->isGuest):?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Url::to('@web/image/user.png') ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php endif ?>
        <form action="<?= Url::to(['index'])?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Products', 'icon' => 'cubes', 'url' => ['item/index']],
                    ['label' => 'Customer', 'icon' => 'cubes', 'url' => ['customer/index']],
                    ['label' => 'Order', 'icon' => 'cubes', 'url' => ['customer-order/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
