<?php

use common\models\Param;
use yii\helpers\Html;

/* @var $model common\models\Product */
?>

<form action="#" class="product-main-info">
    <h2 class="product-title"><?php echo Html::encode($model->title) ?></h2>
    <span class="product-meta"><?php echo Html::encode($model->brand->name) ?></span>
    <p class="product-price"><?php echo Html::encode($model->price) . ' UAH' ?></p>
    <?php /** @var Param $param */
    foreach ($model->params as $param) : ?>
        <?php if ($param->name === 'Color') { ?> <p class="product-filter">Color</p>
            <ul class="product-colors">
                <?php /** @var Param $param */
                foreach ($model->params as $colorParam) : ?>
                    <?php if ($colorParam->name === 'Color') {
                        foreach ($model->productParamValues as $paramValue) : ?>
                            <?php if ($paramValue->param_id == $colorParam->id) { ?>
                                <li class="color-item <?php echo Html::encode($paramValue->value) ?>">
                                    <input name="color" type="radio" value="<?php echo Html::encode($paramValue->value) ?>">
                                </li> <?php } ?>
                        <?php endforeach;
                    } ?>
                <?php endforeach; ?>
            </ul>
        <?php }
        continue; endforeach; ?>

    <?php /** @var Param $param */
    foreach ($model->params as $param) : ?>
        <?php if ($param->name === 'Size') { ?> <p class="product-filter">Size</p>
            <ul class="product-sizes">
                <?php /** @var Param $param */
                foreach ($model->params as $sizeParam) : ?>
                    <?php if ($sizeParam->name === 'Size') {
                        foreach ($model->productParamValues as $paramValue) : ?>
                            <?php if ($paramValue->param_id == $sizeParam->id) { ?>
                                <li class="size-item">
                                    <input name="size" type="radio" value="<?php echo Html::encode($paramValue->value) ?>">
                                    <span>
                                        <?php echo Html::encode($paramValue->value) ?>
                                    </span>
                                </li>
                            <?php } ?>
                        <?php endforeach;
                    } ?>
                <?php endforeach; ?>
            </ul>
        <?php }
        continue; endforeach; ?>
    <p class="product-filter">Quantity</p>
    <div class="product-counter">
        <button class="product-counter-btn" type="button">-</button>
        <input type="number" class="product-counter-value" value="1"/>
        <button class="product-counter-btn increase" type="button">+</button>
    </div>
    <button type="submit" class="btn-add-to-cart">Add to cart</button>
</form>
