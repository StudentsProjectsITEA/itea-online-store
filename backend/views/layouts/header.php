<?php

/* @var $this View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

?>

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo Url::to('/admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <b>
                <?php echo Html::encode('ITEA') ?>
            </b>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>
                <?php echo Html::encode('Online') ?>
            </b>
            <?php echo Html::encode('Store') ?>
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <?php echo $this->render('navbar-messages') ?>

                <?php echo $this->render('navbar-notifications') ?>

                <?php echo $this->render('navbar-tasks') ?>

                <?php echo $this->render('navbar-account') ?>

                <li>
                    <?php echo Html::a('<i class="fa fa-home"></i>', Url::to('/')) ?>
                </li>

            </ul>
        </div>
    </nav>
</header>
