<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'All products | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="category-block container">

    <div class="category-filter">

        <h3 class="filter-title">Filters</h3>
        <form action="#" method="GET">

            <ul class="category-tree">
                <li class="category-tree-item">
                    Women
                    <ul class="category-tree-item-secondary">
                        <li>Tops <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Dresses <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Buttoms <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Jackets and coats <div class="checkbox"><input type="checkbox"><span></span></div></li>
                    </ul>
                </li>
                <li class="category-tree-item">
                    Men
                    <ul class="category-tree-item-secondary">
                        <li>Tops <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Dresses <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Buttoms <div class="checkbox"><input type="checkbox"><span></span></div></li>
                        <li>Jackets and coats <div class="checkbox"><input type="checkbox"><span></span></div></li>
                    </ul>
                </li>
            </ul>

            <h3 class="filter-title filter-divider">Color</h3>
            <ul class="filter-color-panel">
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option black"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option red"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option green"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option purple"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option blue"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option yellow"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option beige"></span></li>
                <li class="filter-color-panel-item"><input type="checkbox" value="black"><span class="filter-color-panel-option brown"></span></li>
            </ul>
            <h3 class="filter-title filter-divider">Price</h3>
            <div class="filter-btn-wrapper filter-divider">
                <input type="number" placeholder="From" class="filter-input">
                <input type="number" placeholder="To" class="filter-input">
            </div>
            <div class="filter-btn-wrapper" class="filter-input">

                <button type="button" class="filter-btn reset">Reset</button>
                <button type="button" class="filter-btn">Search</button>

            </div>
        </form>
    </div>
    <section class="section-listing-products">
        <div class="container">
            <div class="listing">
                <h2 class="listing-title"><?= Html::encode($this->title) ?></h2>

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
</section>
