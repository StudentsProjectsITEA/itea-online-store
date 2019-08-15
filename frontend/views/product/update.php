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

$this->title = 'Update Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'productId' => null,
        'productMainPhoto' => null,
        'createdTime' => null,
        'updatedTime' => null,
        'categoryId' => null,
        'brandId' => null,
    ]) ?>

</div>
