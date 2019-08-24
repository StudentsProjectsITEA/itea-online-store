<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $cart Cart */
/* @var $cartItems array */

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Cart', 'url' => ['/cart']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h2 class="sub-page__title"><?php echo Html::encode($this->title) ?></h2>
<section class="checkout-page container">
    <div class="checkout">

        <?php echo $this->render('cart', [
            'cartItems' => $cartItems,
        ]) ?>

        <?php echo $this->render('shipping') ?>

        <?php echo $this->render('address') ?>

        <?php echo $this->render('payment') ?>

        <?php echo $this->render('total', [
            'cart' => $cart,
        ]) ?>

        <?php /* echo $this->render('modal-success') */ ?>
    </div>
</section>
