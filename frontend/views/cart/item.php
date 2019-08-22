<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

<ul>
    <li class="basket-item">
        <br><p class="basket-item-title"><?php echo Html::encode('Item:') ?></p><br>
        <p class="basket-item-title"><?php echo Html::encode('Quantity:') ?></p>
        <p class="basket-item-title"><?php echo Html::encode('Total:') ?></p>
    </li>
    <?php foreach ($cartItems as $item): ?>
        <li class="basket-item">
            <div>
                <?php echo Html::beginForm(['/cart/remove', 'id' => $item->getId()]) ?>
                <?php echo Html::submitButton('X', ['class' => 'cart-delete-btn']) ?>
                <?php echo Html::endForm(); ?>
            </div>
            <a href="<?php echo Url::to(['product/view', 'id' => $item->getId()]) ?>">
                <?php echo Html::img('@web/img/' . $item->getProduct()->main_photo, [
                    'class' => 'basket-item-img',
                    'href' => Url::to(['product/view', 'id' => $item->getId()]),
                ]) ?>
            </a>
            <div class="basket-item-info">
                <a href="<?php echo Url::to(['product/view', 'id' => $item->getId()]) ?>">
                    <p class="basket-item-title"><?php echo Html::encode($item->getProduct()->title) ?></p>
                </a>
                <p><?php echo Html::encode('Price: ' . $item->getProduct()->price . ' ₴') ?></p>
                <p><?php echo Html::encode('Color: ' . $item->getProduct()->quantity) ?></p>
                <p><?php echo Html::encode('Size: ' . $item->getProduct()->quantity) ?></p>
            </div>
            <div class="product-counter">
                <?php echo Html::beginForm([
                    '/cart/change',
                    'id' => $item->getId(),
                    'qty' => Yii::$app->request->get('qty'),
                ], 'get') ?>
                <?php echo Html::button('-', ['class' => 'product-counter-btn']) ?>
                <?php echo Html::input('number', 'qty', $item->getQuantity(), ['class' => 'product-counter-value']) ?>
                <?php echo Html::button('+', ['class' => 'product-counter-btn increase']) ?>
                <?php echo Html::endForm(); ?>
            </div>
            <p class="basket-item-title"><?php echo Html::encode($item->getCost() . ' ₴') ?></p>
        </li>
    <?php endforeach; ?>
</ul>
