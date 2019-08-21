<?php

use common\repositories\ProductRepository;
use yii\helpers\Url;

/* @var $popularProducts array */
/* @var $productsFind ProductRepository */
?>

<h2 class="category-title">Популярные товары:</h2>
<div class="category-list">
    <?php foreach ($popularProducts as $popularProduct) : ?>
        <a href="<?php echo Url::to([
            'product/view', 'id' => $productsFind->findProductByName($popularProduct['title'])->id,
        ]) ?>" class="category-item">
            <img src="<?php echo Url::to('@web/img/' . $popularProduct['main_photo']); ?>" alt=""
                 class="category-img"/>
            <div class="category-name">
                <?php echo $popularProduct['title']; ?>
            </div>
            <div class="category-link">shop now</div>
        </a>
    <?php endforeach; ?>
</div>
