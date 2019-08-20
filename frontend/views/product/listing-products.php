<?php

use common\repositories\ProductRepository;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $allProducts array */
/* @var $pagination Pagination */
/* @var $productsFind ProductRepository */
?>

<section class="section-listing-products">
    <div class="container">
        <div class="listing">
            <h2 class="listing-title">All goods</h2>

            <div class="listing-products">

                <?php foreach($allProducts as $key => $product) {; ?>

                    <div class="product-item">
                        <a href="<?php echo Url::to([
                            'product/view', 'id' => $productsFind->findProductByName($product['title'])->id,
                        ]) ?>"><img src="<?php echo Url::to('@web/img/') . $product['main_photo']; ?>" alt="" class="product-img" />
                            <p class="product-name"><?php echo $product['title']; ?></p>
                            <p class="product-price"><?php echo $product['price']; ?></p>
                        </a>
                        <button class="product-add-to-cart-btn">Add to cart</button>
                    </div>

                <?php }; ?>

            </div>
        </div>
    </div>

    <div class="container">
        <?php echo LinkPager::widget([
            'pagination' => $pagination,
            'maxButtonCount' => Yii::$app->params['maxButtonPaginationCount'],
            'options' => [
                'tag' => 'ul',
                'class' => 'store-pagination',
            ],
            'linkOptions' => [
                'tag' => 'li',
            ],
            'activePageCssClass' => 'active',
            'prevPageLabel' =>  '<li class="nav-links"><i class="fas fa-arrow-left"></i></li>',
            'nextPageLabel' =>  '<li class="nav-links"><i class="fas fa-arrow-right"></i></li>',
            'nextPageCssClass' => 'hide',
        ]) ?>
    </div>

</section>