<?php

use common\models\Param;
use yii\helpers\Html;

/* @var $model common\models\Product */
?>

<div class="product-tabs-item" data-target="parameters">
    <ul class="parameters-list">
        <li>
            <span class="parameter-name">Brand</span>:
            <span><?php echo Html::encode($model->brand->name) ?></span>
        </li>
        <li>
            <span class="parameter-name">Category</span>:
            <span><?php echo Html::encode($model->category->name) ?></span>
        </li>
        <?php /** @var Param $param */
        foreach ($model->params as $param) : ?>
            <li>
                <span class="parameter-name"><?php echo Html::encode($param->name) ?></span>:
                <?php foreach ($model->productParamValues as $paramValue) : ?>
                    <span><?php echo $paramValue->param_id == $param->id ? Html::encode($paramValue->value) : null ?></span>
                <?php endforeach; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
