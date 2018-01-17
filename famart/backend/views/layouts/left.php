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

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Products', 'icon' => 'cubes', 'url' => ['item/index']],
                    ['label' => 'Category', 'icon' => 'cubes', 'url' => ['item-category/index']],
                    ['label' => 'Statistic', 'icon' => 'cubes', 'url' => ['statistic/index']],
                    ['label' => 'Customer', 'icon' => 'cubes', 'url' => ['customer/index']],
                    ['label' => 'Customer Order', 'icon' => 'cubes', 'url' => ['customer-order/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
