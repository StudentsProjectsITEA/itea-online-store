<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $cart Cart */
/* @var $cartItems array */

$this->title = 'Shopping Cart';
$this->params['breadcrumbs'][] = 'Cart';
?>
<h2 class="sub-page__title"><?php echo Html::encode($this->title) ?></h2>

<?php if (!empty($cartItems = $cart->getItems())): ?>

    <section class="basket-page container">
        <?php echo $this->render('item', [
            'cartItems' => $cartItems,
        ]) ?>

        <?php echo $this->render('total', [
            'cart' => $cart,
        ]) ?>
    </section>

<?php else: ?>

    <?php echo $this->render('empty'); ?>

<?php endif; ?>
