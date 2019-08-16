<?php

use yii\helpers\Html;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $userOrders array */
/* @var $order common\models\Order */
/* @var $products array */
/* @var $product common\models\Product */
/* @var $orderQuantity array */

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

            <form action="#" method="POST" data-target="change-password" class="section-profile-content-item">
                <label class="section-profile-content-label">
                    Current password
                    <input type="password" placeholder="Your current password..." class="section-profile-content-input"
                           value=""/>
                </label>
                <label class="section-profile-content-label">New Password
                    <input type="password" placeholder="Your new password..." class="section-profile-content-input"
                           value=""/>
                </label>
                <label class="section-profile-content-label">Confirm new password
                    <input type="password" placeholder="Confirm new password..." class="section-profile-content-input"
                           value=""/>
                </label>
                <button type="submit" class="section-profile-content-btn">
                    Save password
                </button>
            </form>

            <form action="#" method="POST" id="formAddresses" data-target="addresses"
                  class="section-profile-content-item">
                <?php foreach ($model->address as $key => $address) : ?>
                <label class="section-profile-content-label">Your address <?php echo $key + 1; ?>
                    <input type="text" placeholder="Your address" class="section-profile-content-input"
                           value="<?php echo Html::encode($address) ?>"/>
                </label>
                <?php endforeach; ?>
                <button type="button" class="section-profile-content-btn" id="addNewAddress">
                    Add new address
                </button>

                <button type="submit" class="section-profile-content-btn">
                    Save changes
                </button>
            </form>

            <?php echo $this->render('orders', [
                'userOrders' => $userOrders,
                'products' => $products,
            ]) ?>
        </div>
    </div>
</section>
