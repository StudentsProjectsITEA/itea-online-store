<?php

use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $parentCategory common\models\Category */
/* @var $params array */
/* @var $colorValues array */
/* @var $sizeValues array */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $parentCategory, 'url' => ['category/view', 'id' => $model->category->parent_id]];
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['category/view', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = ['label' => $model->brand->name, 'url' => ['brand/view', 'id' => $model->brand->id]];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<section class="product-main container">
    <?php echo $this->render('slider', [
        'model' => $model,
    ]) ?>

    <?php echo $this->render('information', [
        'model' => $model,
        'colorValues' => $colorValues,
        'sizeValues' => $sizeValues,
    ]) ?>
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

            <?php echo $this->render('parameters', [
                'model' => $model,
                'params' => $params,
                'colorValues' => $colorValues,
                'sizeValues' => $sizeValues,
            ]) ?>

            <?php echo $this->render('comments') ?>
        </div>
    </div>
</section>

<?php $this->registerJs("
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });
    ", View::POS_END) ?>