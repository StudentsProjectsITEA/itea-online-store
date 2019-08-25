<?php

use yii\helpers\Html;

/* @var $model common\models\Product */
/* @var $params array */
/* @var $colorValues array */
/* @var $sizeValues array */
?>

<div class="product-tabs-item" data-target="parameters">
    <ul class="parameters-list">
        <li>
            <span class="parameter-name">Category</span>:
            <span><?php echo Html::encode($model->category->name) ?></span>
        </li>
        <li>
            <span class="parameter-name">Brand</span>:
            <span><?php echo Html::encode($model->brand->name) ?></span>
        </li>

        <?php foreach ($colorValues as $i) : ?>
            <li>
                <span class="parameter-name">Color</span>:
                <span><?php echo Html::encode(implode(", ", $colorValues)) ?></span>
            </li>
        <?php break; endforeach; ?>

        <?php foreach ($sizeValues as $i) : ?>
            <li>
                <span class="parameter-name">Size</span>:
                <span><?php echo Html::encode(implode(", ", $sizeValues)) ?></span>
            </li>
        <?php break; endforeach; ?>

        <?php foreach ($params as $param => $value) : ?>
            <li>
                <span class="parameter-name"><?php echo Html::encode($param) ?></span>:
                <span><?php echo Html::encode($value) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
