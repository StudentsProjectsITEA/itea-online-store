<?php

use yii\helpers\Html;

/* @var $model common\models\Product */
/* @var $colorValues array */
/* @var $sizeValues array */
?>

<form action="#" class="product-main-info">
    <h2 class="product-title"><?php echo Html::encode($model->title) ?></h2>
    <span class="product-meta"><?php echo Html::encode($model->brand->name) ?></span>
    <p class="product-price"><?php echo Html::encode($model->price) . ' UAH' ?></p>

    <?php foreach ($colorValues as $i) : ?>
        <p class="product-filter">Color</p>
        <ul class="product-colors">
            <?php foreach ($colorValues as $value) : ?>
                <label>
                    <li class="color-item <?php echo Html::encode($value) ?> active">
                        <input name="color" type="radio" value="<?php echo Html::encode($value) ?> checked">
                    </li>
                </label>
            <?php endforeach; ?>
        </ul>
    <?php break; endforeach; ?>

    <?php foreach ($sizeValues as $i) : ?>
        <p class="product-filter">Size</p>
        <ul class="product-sizes">
            <?php foreach ($sizeValues as $value) : ?>
                <label>
                    <li class="size-item <?php echo Html::encode($value) ?>">
                        <input name="size" type="radio" value="<?php echo Html::encode($value) ?>">
                        <span><?php echo Html::encode($value) ?></span>
                    </li>
                </label>
            <?php endforeach; ?>
        </ul>
    <?php break; endforeach; ?>

    <p class="product-filter">Quantity</p>
    <div class="product-counter">
        <button class="product-counter-btn" type="button">-</button>
        <label>
            <input name="quantity" type="number" class="product-counter-value" value="1"/>
        </label>
        <button class="product-counter-btn increase" type="button">+</button>
    </div>
    <button type="submit" class="btn-add-to-cart">Add to cart</button>
</form>
