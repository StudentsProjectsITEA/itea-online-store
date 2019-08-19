<?php

use devanych\cart\Cart;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $cart Cart */
/* @var $cartItems array */

$this->title = 'Cart | Online Store | ITEA';
$this->params['breadcrumbs'][] = 'Cart';
?>
<h2 class="sub-page__title"><?php echo Html::encode($this->title) ?></h2>

<?php if (!empty($cartItems = $cart->getItems())): ?>
    <section class="basket-page container">
        <form action="#" method="POST" class="basket-items-form">

            <?php echo $this->render('item', [
                'cartItems' => $cartItems,
            ]) ?>

            <?php echo $this->render('total', [
                'cart' => $cart,
            ]) ?>

        </form>
    </section>

<?php else: ?>

    <h3><?php echo Html::encode('Cart is empty!') ?></h3>

<?php endif; ?>
