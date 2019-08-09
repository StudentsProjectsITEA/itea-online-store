<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Cart | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2 class="sub-page__title"><?= Html::encode($this->title) ?></h2>
<section class="basket-page container">
    <ul class="basket-items-list">
        <li class="basket-item">
            <span class="basket-item-delete"><i class="fas fa-times"></i></span>
            <img
                    class="basket-item-img"
                    src="<?php echo Url::to('@web/img/images.png'); ?>"
            />
            <div class="basket-item-info">
                <p class="basket-item-title">Sleeveless Cowl Neck Top</p>
                <p>Color White Multi</p>
                <p>Size M</p>
            </div>
            <div class="product-counter">
                <button class="product-counter-btn">-</button>
                <span class="product-counter-value">0</span>
                <button class="product-counter-btn">+</button>
            </div>
            <p class="basket-item-title">$65.55</p>
        </li>

        <li class="basket-item">
            <span class="basket-item-delete"><i class="fas fa-times"></i></span>
            <img
                    class="basket-item-img"
                    src="<?php echo Url::to('@web/img/images.png'); ?>"
            />
            <div class="basket-item-info">
                <p class="basket-item-title">Sleeveless Cowl Neck Top</p>
                <p>Color White Multi</p>
                <p>Size M</p>
            </div>
            <div class="product-counter">
                <button class="product-counter-btn">-</button>
                <span class="product-counter-value">0</span>
                <button class="product-counter-btn">+</button>
            </div>
            <p class="basket-item-title">$65.55</p>
        </li>
    </ul>

    <div class="basket-final-order">
        <h3 class="basket-final-order-title">My order</h3>
        <ul class="basket-final-order-info">
            <li>
                <span class="title">Total</span><span class="price">$65.99</span>
            </li>
            <li>
                <span class="title">Доставка</span><span class="price">Free</span>
            </li>
        </ul>
        <a href="<?php echo Url::toRoute('checkout', true); ?>" class="btn-add-to-cart">Checkout</a>
    </div>
</section>