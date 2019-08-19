<?php

use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $userOrders array */

$this->title = 'My Account';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
            <li class="section-profile-navmenu-item" data-target="addresses">
                My addresses
            </li>
            <li class="section-profile-navmenu-item" data-target="order-history">
                My Orders
            </li>
            <li class="section-profile-navmenu-item logout">Logout</li>
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
            ]); ?>

            <?php echo $this->render('addresses.php', [
                'model' => $model,
            ]); ?>

            <?php echo $this->render('orders', [
                'userOrders' => $userOrders,
            ]) ?>
        </div>
    </div>
</section>
