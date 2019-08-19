<?php

use yii\helpers\Url;

/* @var $model common\models\Product */
?>

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
