<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $productId string */
/* @var $productMainPhoto string */
/* @var $createdTime int */
/* @var $updatedTime int */
/* @var $categoryId string */
/* @var $brandId string */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'productId' => $productId,
        'productMainPhoto' => $productMainPhoto,
        'createdTime' => $createdTime,
        'updatedTime' => $updatedTime,
        'categoryId' => $categoryId,
        'brandId' => $brandId,
    ]) ?>

</div>
