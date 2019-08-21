<?php

use common\models\Product;
use common\models\ProductSearch;
use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use yii\data\Pagination;

/**
 * @var $this yii\web\View
 * @var $allCategories array
 * @var $categoriesFind CategoryRepository
 * @var $productsFind ProductRepository
 * @var $popularProducts[] Product
 * @var $popularCategories array
 * @var $dataProvider ProductSearch
 */

$this->title = 'Online Store | ITEA';
?>

<?php echo $this->render('categories-menu', [
    'allCategories' => $allCategories,
    'categoriesFind' => $categoriesFind,
]) ?>

<?php echo $this->render('/product/listing-products', [
    'dataProvider' => $dataProvider,
]) ?>

<section class="shop-category">
    <div class="container">

        <?php echo $this->render('popular-products', [
        'popularProducts' => $popularProducts,
        ]) ?>

        <?php echo $this->render('popular-categories', [
        'popularCategories' => $popularCategories,
        'categoriesFind' => $categoriesFind,
        ]) ?>

    </div>
</section>
