<?php

use common\models\Brand;
use common\models\Category;

/**
 * @var $allCategories array
 * @var $category Category
 * @var $allBrands array
 * @var $brand Brand
 * @var $param array
 */
$get = Yii::$app->request->queryParams;

?>

<div class="category-filter">

    <h2 class="filter-title">ФИЛЬТР :</h2>
    <form action="#" method="GET">

        <ul class="category-tree">
            <li class="category-tree-item">
                Категории
                <ul class="category-tree-item-secondary">
                    <?php foreach ($allCategories as $category) : ?>
                        <li>
                            <?php echo $category->name; ?>
                            <div class="checkbox">
                                <input type="checkbox"
                                       <?php echo (Yii::$app->request->get($category->name) ? 'checked' : NULL); ?>
                                       name="<?php echo $category->name; ?>" >
                                <span></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="category-tree-item">
                Бренды
                <ul class="category-tree-item-secondary">
                    <?php foreach ($allBrands as $brand) : ?>
                        <li>
                            <?php echo $brand->name; ?>
                            <div class="checkbox">
                                <input type="checkbox"
                                       <?php echo (Yii::$app->request->get($brand->name) ? 'checked' : NULL); ?>
                                       name="<?php echo $brand->name; ?>" >
                                <span></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>

        <h3 class="filter-title filter-divider">Цена</h3>
        <div class="filter-btn-wrapper filter-divider">
            <input type="number"
                   placeholder="From"
                   name="minPrice"
                   class="filter-input"
                   value="<?php echo Yii::$app->request->get('minPrice'); ?>">
            <input type="number"
                   placeholder="To"
                   name="maxPrice"
                   class="filter-input"
                   value="<?php echo Yii::$app->request->get('maxPrice'); ?>">
        </div>
        <div class="filter-btn-wrapper" class="filter-input">

            <button type="button" class="filter-btn reset">Reset</button>
            <button type="submit" class="filter-btn">Search</button>

        </div>
    </form>
</div>
