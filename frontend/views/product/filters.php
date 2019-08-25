<?php

use common\models\Brand;
use common\models\Category;
use yii\bootstrap\Html;
use yii\helpers\Url;

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
    <?php echo Html::beginForm('/products', 'get') ?>
    <ul class="category-tree">
        <li class="category-tree-item">
            Категории
            <ul class="category-tree-item-secondary">
                <?php foreach ($allCategories as $category) : ?>
                    <li>
                        <?php echo $category->name; ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                    <?php echo(Yii::$app->request->get($category->name) ? 'checked' : null); ?>
                                       name="<?php echo $category->name; ?>">
                                <span></span>
                            </label>
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
                            <label>
                                <input type="checkbox"
                                    <?php echo(Yii::$app->request->get($brand->name) ? 'checked' : null); ?>
                                       name="<?php echo $brand->name; ?>">
                                <span></span>
                            </label>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>

    <h3 class="filter-title filter-divider">Цена</h3>
    <div class="filter-btn-wrapper filter-divider">

        <?php echo Html::input('number', 'minPrice', Yii::$app->request->get('minPrice') ?? '', [
            'class' => 'filter-input',
            'placeholder' => 'From'
        ]) ?>

        <?php echo Html::input('number', 'maxPrice', Yii::$app->request->get('maxPrice') ?? '', [
            'class' => 'filter-input',
            'placeholder' => 'To'
        ]) ?>

    </div>
    <div class="filter-btn-wrapper">
        <a href="<?php echo Url::to('/products') ?>">

            <?php echo Html::button('Reset', [
                'class' => 'filter-btn reset',
                'placeholder' => 'To',
            ]) ?>

        </a>

        <?php echo Html::submitButton('Search', [
            'class' => 'filter-btn',
            'placeholder' => 'To'
        ]) ?>

    </div>
    <?php echo Html::endForm(); ?>
</div>
