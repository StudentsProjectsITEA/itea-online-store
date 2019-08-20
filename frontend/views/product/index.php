<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\ProductSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 *
 * @var $allProducts
 * @var $allBrands
 * @var $allCategories
 * @var $pagination
 * @var $productsFind
 */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="category-block container">

    <?php echo $this->render('filters', [
        'allCategories' => $allCategories,
        'allBrands' => $allBrands,
    ]) ?>

    <?php echo $this->render('listing-products', [
        'allProducts' => $allProducts,
        'data'
        //'pagination' => $pagination,
    ]) ?>



<!--    <section class="section-listing-products">-->
<!--        <div class="container">-->
<!--            <div class="listing">-->
<!--                <h2 class="listing-title">--><?//= Html::encode($this->title) ?><!--</h2>-->
<!---->
<!--                <div class="listing-products">-->
<!--                    <div class="product-item">-->
<!--                        <a href="#"><img src="--><?php //echo Url::to('@web/img/img_1.jpg'); ?><!--" alt="" class="product-img" />-->
<!--                            <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>-->
<!--                            <p class="product-price">$599.00</p>-->
<!--                        </a>-->
<!--                        <button class="product-add-to-cart-btn">Add to cart</button>-->
<!--                    </div>-->
<!--                    <div class="product-item">-->
<!--                        <a href="#"><img src="--><?php //echo Url::to('@web/img/img_2.jpg'); ?><!--" alt="" class="product-img" />-->
<!--                            <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>-->
<!--                            <p class="product-price">$599.00</p>-->
<!--                        </a>-->
<!--                        <button class="product-add-to-cart-btn">Add to cart</button>-->
<!--                    </div>-->
<!--                    <div class="product-item">-->
<!--                        <a href="#"><img src="--><?php //echo Url::to('@web/img/img_3.jpg'); ?><!--" alt="" class="product-img" />-->
<!--                            <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>-->
<!--                            <p class="product-price">$599.00</p>-->
<!--                        </a>-->
<!--                        <button class="product-add-to-cart-btn">Add to cart</button>-->
<!--                    </div>-->
<!--                    <div class="product-item">-->
<!--                        <a href="#"><img src="--><?php //echo Url::to('@web/img/img_4.jpg'); ?><!--" alt="" class="product-img" />-->
<!--                            <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>-->
<!--                            <p class="product-price">$599.00</p>-->
<!--                        </a>-->
<!--                        <button class="product-add-to-cart-btn">Add to cart</button>-->
<!--                    </div>-->
<!--                    <div class="product-item">-->
<!--                        <a href="#"><img src="--><?php //echo Url::to('@web/img/img_5.jpg'); ?><!--" alt="" class="product-img" />-->
<!--                            <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>-->
<!--                            <p class="product-price">$599.00</p>-->
<!--                        </a>-->
<!--                        <button class="product-add-to-cart-btn">Add to cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="container">-->
<!--            <ul class="store-pagination">-->
<!--                <li class="nav-links">-->
<!--                    <a href="#"><i class="fas fa-arrow-left"></i></a>-->
<!--                </li>-->
<!--                <li class="active"><a href="#">1</a></li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!--                <li><a href="#">4</a></li>-->
<!--                <li><a href="#">5</a></li>-->
<!--                <li><a href="#">6</a></li>-->
<!--                <li class="nav-links">-->
<!--                    <a href="#"><i class="fas fa-arrow-right"></i></a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </section>-->

</section>
