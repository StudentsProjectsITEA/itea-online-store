<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Product | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="product-main container">
    <div class="slider-wrapper">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_1.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_2.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_3.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_4.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_5.jpg'); ?>)">
                </div>
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_1.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_2.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_3.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_4.jpg'); ?>)">
                </div>
                <div class="swiper-slide" style="background-image:url(<?php echo Url::to('@web/img/img_5.jpg'); ?>)">
                </div>
            </div>
        </div>
    </div>

    <form action="#" class="product-main-info">
        <h2 class="product-title"><?= Html::encode($this->title) ?></h2>
        <span class="product-meta">Item No. 25697212</span>
        <p class="product-price">SGD 139.90 </p>
        <p class="product-filter">Color</p>
        <ul class="product-colors">
            <li class="color-item red active"></li>
        </ul>
        <p class="product-filter">Size</p>
        <ul class="product-sizes">
            <li class="size-item">1</li>
            <li class="size-item active">2</li>
            <li class="size-item">3</li>
            <li class="size-item">4</li>
        </ul>
        <p class="product-filter">Quantity</p>
        <div class="product-counter">
            <button class="product-counter-btn">-</button>
            <span class="product-counter-value">0</span>
            <button class="product-counter-btn">+</button>
        </div>

        <button type="submit" class="btn-add-to-cart">Add to cart</button>
    </form>

</section>
<section>

    <div class="product-tabs">
        <ul class="product-tabs-options">
            <li data-target="comments">Comments</li>
            <li data-target="parameters">Additional parameters</li>
            <li data-target="description" class="active">Description</li>
        </ul>
        <div class="product-tabs-content">
            <div class="product-tabs-item" data-target="comments">
                <ul class="comments-list">
                    <li>
                        <div class="user-photo">
                            <img src="../img/featured.png" alt="user-photo">
                        </div>

                        <p>Very good mf item. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam cum
                            consequatur sint, quis voluptatem vitae reiciendis eius repudiandae ullam, incidunt nemo
                            praesentium laudantium soluta nihil maxime beatae, nostrum numquam? Unde.</p>
                    </li>
                    <li>
                        <div class="user-photo">
                            <!-- no-photo --> <img src="../img/account.png" alt="user-photo">
                        </div>

                        <p>Very good mf item. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam cum
                            praesentium laudantium soluta nihil maxime beatae, nostrum numquam? Unde.</p>
                    </li>
                </ul>
                <form action="#" method="POST" class="comments-add-form">
                    <textarea class="comments-input"></textarea>
                    <button class="comments-add-new">Add new comment</button>
                </form>
            </div>
            <div class="product-tabs-item" data-target="parameters">
                <ul class="parameters-list">
                    <li>
                        <span class="parameter-name">ParameterName</span>:<span>Parame</span>
                    </li>
                    <li>
                        <span class="parameter-name">ParameterName</span>:<span>1</span>
                    </li>
                    <li>
                        <span class="parameter-name">ParameterName</span>:<span>ParameterValue</span>
                    </li>
                </ul>
            </div>
            <div class="product-tabs-item active" data-target="description">
                <p class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio
                    cupiditate rem quam saepe reprehenderit sed voluptatibus eaque excepturi perspiciatis adipisci,
                    officiis similique, dolor enim cum necessitatibus quos dolores impedit voluptates.</p>
            </div>
        </div>
    </div>
</section>
