<?php

use yii\helpers\Html;

?>

<div class="container cart center">
    <h3 class="sub-page__sub-title"><?php echo Html::encode('Cart is empty!') ?></h3>
    <?php echo Html::img('@web/img/empty_cart.jpg') ?>

    <?php echo Html::beginForm('/products') ?>
    <?php echo Html::submitButton('Go shop', ['class' => 'btn-add-to-cart', 'style' => 'margin: 0 auto 50px;']) ?>
    <?php echo Html::endForm(); ?>
</div>
