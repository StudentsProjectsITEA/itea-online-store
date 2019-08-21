<?php

use common\models\Product;
use yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * @var $model Product
 */

?>

<a href="<?php echo Url::to(['product/view', 'id' => $model->id]) ?>">
    <?php echo Html::img(Url::to('@web/img/') . $model->main_photo, ['class' => 'product-img']); ?>
    <p class="product-name"><?php echo $model->title; ?></p>
    <p class="product-price"><?php echo $model->price . ' UAH'; ?></p>
</a>
<button class="product-add-to-cart-btn">Add to cart</button>
