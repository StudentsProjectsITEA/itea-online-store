<?php

use common\models\Param;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $category common\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$parentId = $category::findOne($model->category->parent_id)->name;
$parentId === 'root' ? null : $this->params['breadcrumbs'][] = ['label' => $parentId, 'url' => ['category/view', 'id' => $model->category->parent_id]];
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['category/view', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<section class="product-main container">


    <div class="slider-wrapper">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <?php foreach ($model->photos as $photo) : ?>
                    <div class="swiper-slide"
                         style="background-image:url(<?php echo Url::to('@web/img/' . $photo->name); ?>)">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                <?php foreach ($model->photos as $photo) : ?>
                    <div class="swiper-slide"
                         style="background-image:url(<?php echo Url::to('@web/img/' . $photo->name); ?>)">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <form action="#" class="product-main-info">
        <h2 class="product-title"><?php echo Html::encode($model->title) ?></h2>
        <span class="product-meta"><?php echo Html::encode($model->brand->name) ?></span>
        <p class="product-price"><?php echo Html::encode($model->price) . ' UAH' ?></p>
        <?php /** @var Param $param */
        foreach ($model->params as $param) : ?>
            <?php if ($param->name === 'Color') { ?> <p class="product-filter">Color</p>
                <ul class="product-colors">
                    <?php /** @var Param $param */
                    foreach ($model->params as $colorParam) : ?>
                        <?php if ($colorParam->name === 'Color') {
                            foreach ($model->productParamValues as $paramValue) : ?>
                                <?php if ($paramValue->param_id == $colorParam->id) { ?>
                                    <li
                                    class="color-item <?php echo Html::encode($paramValue->value) ?> active"></li> <?php } ?>
                            <?php endforeach;
                        } ?>
                    <?php endforeach; ?>
                </ul>
            <?php }
            continue; endforeach; ?>

        <?php /** @var Param $param */
        foreach ($model->params as $param) : ?>
            <?php if ($param->name === 'Size') { ?> <p class="product-filter">Size</p>
                <ul class="product-sizes">
                    <?php /** @var Param $param */
                    foreach ($model->params as $sizeParam) : ?>
                        <?php if ($sizeParam->name === 'Size') {
                            foreach ($model->productParamValues as $paramValue) : ?>
                                <?php if ($paramValue->param_id == $sizeParam->id) { ?>
                                    <li class="size-item"><input name="size" type="radio" value="<?php echo Html::encode($paramValue->value) ?>">
                                        <span>
                                            <?php echo Html::encode($paramValue->value) ?>
                                        </span>
                                    </li>
                                <?php } ?>
                            <?php endforeach;
                        } ?>
                    <?php endforeach; ?>
                </ul>
            <?php }
            continue; endforeach; ?>
        <p class="product-filter">Quantity</p>
        <div class="product-counter">
            <button class="product-counter-btn" type="button">-</button>
            <input type="number" class="product-counter-value" value="1"/>
            <button class="product-counter-btn increase" type="button">+</button>
        </div>
        <button type="submit" class="btn-add-to-cart">Add to cart</button>
    </form>
</section>

<section>
    <div class="product-tabs">
        <ul class="product-tabs-options">
            <li data-target="description" class="active">Description</li>
            <li data-target="parameters">Additional parameters</li>
            <li data-target="comments">Comments</li>
        </ul>
        <div class="product-tabs-content">
            <div class="product-tabs-item active" data-target="description">
                <p class="product-description"><?php echo Html::encode($model->description) ?></p>
            </div>
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
            <div class="product-tabs-item" data-target="comments">
                <ul class="comments-list">
                    <li>
                        <div class="user-photo">
                            <img src="<?php echo Url::to('@web/img/featured.png'); ?>" alt="user-photo">
                        </div>

                        <p>Very good mf item. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam cum
                            consequatur sint, quis voluptatem vitae reiciendis eius repudiandae ullam, incidunt nemo
                            praesentium laudantium soluta nihil maxime beatae, nostrum numquam? Unde.</p>
                    </li>
                    <li>
                        <div class="user-photo">
                            <!-- no-photo --> <img src="<?php echo Url::to('@web/img/account.png'); ?>" alt="user-photo">
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
        </div>
    </div>
</section>
