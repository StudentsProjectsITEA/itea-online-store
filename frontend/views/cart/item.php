<?php

use devanych\cart\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $cartItems array */
/* @var $item CartItem */

?>

<ul>
    <?php foreach ($cartItems as $item): ?>
        <li class="basket-item">
            <span class="basket-item-delete" href="<?php Url::to(['cart/remove', 'id' => $item->getId()]) ?>">
                <i class="fas fa-times"></i>
            </span>
            <?php echo Html::img('@web/img/' . $item->getProduct()->main_photo, ['class' => 'basket-item-img']) ?>
            <div class="basket-item-info">
                <p class="basket-item-title"><?php echo Html::encode($item->getProduct()->title) ?></p>
                <p><?php echo Html::encode('Color: ' . $item->getProduct()->quantity) ?></p>
                <p><?php echo Html::encode('Size: ' . $item->getProduct()->quantity) ?></p>
            </div>
            <div class="product-counter">
                <?php echo Html::button('-', ['class' => 'product-counter-btn']) ?>
                <?php echo Html::input('number', null, null, [
                    'class' => 'product-counter-value',
                    'value' => $item->getQuantity(),
                ]) ?>
                <?php echo Html::button('+' . ['class' => 'product-counter-btn increase']) ?>
            </div>
            <p class="basket-item-title"><?php echo Html::encode($item->getCost() . ' ₴') ?></p>
        </li>
    <?php endforeach; ?>
</ul>
