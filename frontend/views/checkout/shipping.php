<?php

use frontend\models\CheckoutForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $model CheckoutForm */
/* @var $form ActiveForm */

?>

<div class="checkout-delivery-method">
    <p class="checkout-delivery-details-title">
        <?php echo Html::encode('Choose one of shipping method') ?>
    </p>
    <ul class="checkout-delivery-list">
        <li>

            <?php echo $form
                ->field($model, 'shipping_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'pickup',
                    'class' => 'delivery-input active',
                    'value' => 1,
                    'checked' => '',
                    'uncheckValue' => null,
                    'onChange'=>' if($(this).prop("checked")){ var radioValue = 1;$(this).val(radioValue); var radioName = "CheckoutForm[shipping_id]"; RadioSelected(radioName,radioValue);}else{$(this).val("")};',
                ]) ?>

            <label class="delivery-link" title="Pickup Shipping" for="pickup">
                <div class="delivery-link-block">
                    <p>
                        <?php echo Html::encode('Pickup Shipping') ?>
                    </p>
                    <p>
                        <?php echo Html::encode('Price: 0 ₴') ?>
                    </p>
                </div>
            </label>
        </li>
        <li>

            <?php echo $form
                ->field($model, 'shipping_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'courier',
                    'class' => 'delivery-input',
                    'value' => 2,
                    'uncheckValue' => null,
                ]) ?>

            <label class="delivery-link" title="Courier Shipping" for="courier">
                <div class="delivery-link-block">
                    <p>
                        <?php echo Html::encode('Courier Shipping') ?>
                    </p>
                    <p>
                        <?php echo Html::encode('Shipping time: 1-2 days') ?>
                    </p>
                    <p>
                        <?php echo Html::encode('Price: 100 ₴') ?>
                    </p>
                </div>
            </label>
        </li>
        <li>

            <?php echo $form
                ->field($model, 'shipping_id', [
                    'options' => [
                        'tag' => false
                    ],
                    'enableLabel' => false,
                    'radioTemplate' => "{input}"
                ])
                ->radio([
                    'id' => 'post-office',
                    'class' => 'delivery-input',
                    'value' => 3,
                    'uncheckValue' => null,
                ]) ?>

            <label class="delivery-link" title="Post Office Shipping" for="post-office">
                <div class="delivery-link-block">
                    <p>
                        <?php echo Html::encode('Post Office Shipping') ?>
                    </p>
                    <p>
                        <?php echo Html::encode('Shipping time: 3-5 days') ?>
                    </p>
                    <p>
                        <?php echo Html::encode('Price: 80 ₴') ?>
                    </p>
                </div>
            </label>
        </li>
    </ul>
</div>
