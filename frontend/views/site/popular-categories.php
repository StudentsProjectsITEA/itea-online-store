<?php

use common\repositories\CategoryRepository;
use yii\helpers\Url;

/* @var $popularCategories array */
/* @var $categoriesFind CategoryRepository */
?>

<h2 class="category-title">Популярные категории:</h2>
<div class="category-list">
    <?php foreach ($popularCategories as $popularCategory => $name) : ?>
        <a href="<?php echo Url::to([
            'category/view', 'id' => $categoriesFind->findCategoryByName($popularCategory)->id,
        ]) ?>" class="category-item">
            <img src="<?php echo Url::to('@web/img/img_1.jpg'); ?>" alt=""
                 class="category-img"/>
            <div class="category-name">
                <?php echo $popularCategory . ' - ' . $name['count'] . ' ' . $name['end']; ?>
            </div>
            <div class="category-link">shop now</div>
        </a>
    <?php endforeach; ?>
</div>
