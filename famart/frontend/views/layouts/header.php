<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">FAM</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php if(Yii::$app->user->isGuest):?>
                <li>
                    <a href="<?= Url::to(['site/login'])?>">Login</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/signup'])?>">Register</a>
                </li>
                <?php else : ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Url::to('@web/image/user.png') ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Url::to('@web/image/user.png') ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= Yii::$app->user->identity->username ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="<?= Url::to(['barang/index'])?>">Barang</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="<?= Url::to(['pelanggan/index'])?>">Pelanggan</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="<?= Url::to(['supplier/index'])?>">Supplier</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="https://www.bukalapak.com/my_lapak" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
            </ul>
        </div>
    </nav>
</header>
