<?php

use common\helpers\OrderDetails;
use devanych\cart\Cart;
use frontend\models\CheckoutForm;
use frontend\models\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $cart Cart */
/* @var $cartItems array */
/* @var $model CheckoutForm */
/* @var $user User */
/* @var $orderDetails OrderDetails */

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Cart', 'url' => ['/cart']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php if (!empty($cartItems = $cart->getItems())): ?>
    <h2 class="sub-page__title"><?php echo Html::encode($this->title) ?></h2>
    <section class="checkout-page container">
        <div class="checkout">

            <?php echo $this->render('cart', [
                'cartItems' => $cartItems,
            ]) ?>

            <?php echo $this->render('checkout-form', [
                'model' => $model,
                'user' => $user,
                'orderDetails' => $orderDetails,
            ]) ?>

            <?php echo $this->render('total', [
                'cart' => $cart,
            ]) ?>

        </div>
    </section>

<?php else: ?>

    <?php echo $this->render('/cart/empty'); ?>

<?php endif; ?>