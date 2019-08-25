<?php

use common\components\OrderDetailsViewer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $changePasswordModel frontend\models\ChangePasswordForm */
/* @var $userOrders array */
/* @var $orderDetailsViewer OrderDetailsViewer */

$this->title = 'My Account';
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<section class="section-profile">
    <div class="section-profile-main container">
        <ul class="section-profile-navmenu">
            <li class="section-profile-navmenu-item active" data-target="dashboard">
                Personal Information
            </li>
            <li class="section-profile-navmenu-item" data-target="personal-info">
                Settings
            </li>
            <li class="section-profile-navmenu-item" data-target="change-password">
                Change Password
            </li>
            <!--
                <li class="section-profile-navmenu-item" data-target="addresses">
                    My addresses
                </li>
            -->
            <li class="section-profile-navmenu-item" data-target="order-history">
                My Orders
            </li>
            <a class="logout" href="<?php echo Url::to(['user/logout']) ?>">
            <li class="section-profile-navmenu-item logout" data-target="logout">
                Logout
            </li>
            </a>
        </ul>
        <div class="section-profile-content">
            <?php echo $this->render('dashboard', [
                'model' => $model,
            ]) ?>

            <?php echo $this->render('settings-form', [
                'model' => $model,
            ]); ?>

            <?php echo $this->render('change-password', [
                'model' => $model,
                'changePasswordModel' => $changePasswordModel,
            ]); ?>

            <?php /* echo $this->render('addresses', [
                'model' => $model,
            ]); */ ?>

            <?php echo $this->render('orders', [
                'userOrders' => $userOrders,
                'orderDetailsViewer' => $orderDetailsViewer,
            ]) ?>

            <?php
                echo Html::beginForm(['logout'], 'post', ['data-target' => 'logout']) . Html::endForm();
            ?>
        </div>
    </div>
</section>
