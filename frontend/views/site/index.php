<?php

/**
 * @var $this yii\web\View
 * @var $allCategories Category
 */

use common\models\Category;
use yii\helpers\Url;

$this->title = 'Online Store | ITEA';
?>
<section class="sub-menu-wrapper">
    <div class="container">
        <div class="sub-menu-wrapper-inner">
            <div class="sub-menu-left">

                <?php foreach ($allCategories as $subCategory => $categories) : ?>
                    <div class="sub-menu-left-list">
                        <h2 class="sub-menu-left-title"><?php echo $subCategory; ?></h2>
                        <ul class="sub-menu-category-list">
                            <?php foreach ($categories as $category) : ?>
                            <li class="sub-menu-category-item">
                                <a href="" class="sub-menu-category-link"><?php echo $category; ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<section class="section-listing-products">
    <div class="container">
        <div class="listing">
            <h2 class="listing-title">All goods</h2>

            <div class="listing-products">
                <div class="product-item">
                    <a href="#"><img src="<?php echo Url::to('@web/img/img_1.jpg'); ?>" alt="" class="product-img" />
                        <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>
                        <p class="product-price">$599.00</p>
                    </a>
                    <button class="product-add-to-cart-btn">Add to cart</button>
                </div>
                <div class="product-item">
                    <a href="#"><img src="<?php echo Url::to('@web/img/img_2.jpg'); ?>" alt="" class="product-img" />
                        <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>
                        <p class="product-price">$599.00</p>
                    </a>
                    <button class="product-add-to-cart-btn">Add to cart</button>
                </div>
                <div class="product-item">
                    <a href="#"><img src="<?php echo Url::to('@web/img/img_3.jpg'); ?>" alt="" class="product-img" />
                        <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>
                        <p class="product-price">$599.00</p>
                    </a>
                    <button class="product-add-to-cart-btn">Add to cart</button>
                </div>
                <div class="product-item">
                    <a href="#"><img src="<?php echo Url::to('@web/img/img_4.jpg'); ?>" alt="" class="product-img" />
                        <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>
                        <p class="product-price">$599.00</p>
                    </a>
                    <button class="product-add-to-cart-btn">Add to cart</button>
                </div>
                <div class="product-item">
                    <a href="#"><img src="<?php echo Url::to('@web/img/img_5.jpg'); ?>" alt="" class="product-img" />
                        <p class="product-name">No-Iron Easy Care Sleeveless Shirt</p>
                        <p class="product-price">$599.00</p>
                    </a>
                    <button class="product-add-to-cart-btn">Add to cart</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="store-pagination">
            <li class="nav-links">
                <a href="#"><i class="fas fa-arrow-left"></i></a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li class="nav-links">
                <a href="#"><i class="fas fa-arrow-right"></i></a>
            </li>
        </ul>
    </div>
</section>

<section class="shop-category">
    <div class="container">
        <h2 class="category-title">Popular products</h2>
        <div class="category-list">
            <?php foreach ($popularProducts as $popularProduct) : ?>
                <a href="" class="category-item">
                    <img src="<?php echo Url::to('@web/img/' . $popularProduct['main_photo']); ?>" alt=""
                         class="category-img" />
                    <div class="category-name"><?php echo $popularProduct['title']; ?></div>
                    <div class="category-link">shop now</div>
                </a>
            <?php endforeach; ?>
        </div>
        <h2 class="category-title">Popular categories</h2>
        <div class="category-list">

            <?php foreach ($popularCategories as $name=>$popularCategory) : ?>
                <a href="" class="category-item">
                    <img src="<?php echo Url::to('@web/img/img_1.jpg'); ?>" alt=""
                         class="category-img" />
                    <div class="category-name">
                        <?php echo $name . ' - ' . $popularCategory['count'] . ' ' . $popularCategory['end']; ?>
                    </div>
                    <div class="category-link">shop now</div>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
