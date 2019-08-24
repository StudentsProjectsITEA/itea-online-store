<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="modal-backdrop">
    <div class="modal-success">
        <p class="modal-success-order-text">
            <?php echo Html::encode('Your order was successfully placed in our store.') ?>
        </p>
        <p class="modal-success-order-text">
            <?php echo Html::encode('Details of your order was sent to your email.') ?>
        </p>
        <p class="modal-success-order-text-number">
            <?php echo Html::encode('ORDER ID: ') ?>
        </p>
        <a class="active" aria-current="page" href="<?php echo Url::to('/') ?>">
            <?php echo Html::beginForm(); ?>
            <?php echo Html::button('OK', ['class' => 'modal-success-order-btn']) ?>
            <?php echo Html::endForm(); ?>
        </a>
    </div>
</div>
