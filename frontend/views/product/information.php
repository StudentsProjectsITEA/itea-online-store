<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\Product */
/* @var $colorValues array */
/* @var $sizeValues array */
?>

<?php $form = ActiveForm::begin([
    'method' => 'get',
    'action' => [
        '/cart/add',
        'id' => $model->id,
        'qty' => Yii::$app->request->get('qty') ?? null,
    ],
    'options' => ['class' => 'product-main-info']
]); ?>

<h2 class="product-title"><?php echo Html::encode($model->title) ?></h2>
<span class="product-meta"><?php echo Html::encode($model->brand->name) ?></span>
<p class="product-price"><?php echo Html::encode($model->price) . ' UAH' ?></p>

<?php foreach ($colorValues as $i) : ?>
    <p class="product-filter">Color</p>
    <ul class="product-colors">
        <?php foreach ($colorValues as $value) : ?>
            <label>
                <li class="color-item <?php echo Html::encode($value) ?> active">
                    <?php
                    echo Html::radio('color', true, ['value' => $value])
                    ?>
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
                    <?php
                    echo Html::radio('size', true, ['value' => $value])
                    ?>
                    <span><?php echo Html::encode($value) ?></span>
                </li>
            </label>
        <?php endforeach; ?>
    </ul>
    <?php break; endforeach; ?>

<p class="product-filter">Quantity</p>
<div class="product-counter">
    <?php echo Html::button('-', ['class' => 'product-counter-btn']) ?>
    <label>
        <input name="qty" type="number" class="product-counter-value" value="1"/>
    </label>
    <?php echo Html::button('+', ['class' => 'product-counter-btn increase']) ?>
</div>
<?php echo Html::submitButton('Add to cart', ['class' => 'btn-add-to-cart']) ?>

<?php ActiveForm::end(); ?>
