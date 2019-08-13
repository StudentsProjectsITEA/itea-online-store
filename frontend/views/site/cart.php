<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Cart | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2 class="sub-page__title"><?= Html::encode($this->title) ?></h2>
<section class="basket-page container">
    <form action="#" method="POST" class="basket-items-form">
        <ul>
            <li class="basket-item">
                <input type="text" value="12345" hidden />
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
                    <button type="button" class="product-counter-btn">-</button>
                    <input type="number" class="product-counter-value" value="1" />
                    <button type="button" class="product-counter-btn increase">
                        +
                    </button>
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
                    <button type="button" class="product-counter-btn">-</button>
                    <input type="number" class="product-counter-value" value="1" />
                    <button type="button" class="product-counter-btn increase">
                        +
                    </button>
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
            <button type="submit" class="btn-add-to-cart">Checkout</button>
        </div>
    </form>
</section>
