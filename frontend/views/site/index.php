<?php

use common\repositories\CategoryRepository;
use common\repositories\ProductRepository;
use yii\data\Pagination;

/**
 * @var $this yii\web\View
 * @var $allCategories array
 * @var $categoriesFind CategoryRepository
 * @var $productsFind ProductRepository
 * @var $allProducts
 * @var $popularProducts
 * @var $popularCategories
 * @var $pagination Pagination
 */

$this->title = 'Online Store | ITEA';
?>

<?php echo $this->render('categories-menu', [
    'allCategories' => $allCategories,
    'categoriesFind' => $categoriesFind,
]) ?>

<?php echo $this->render('listing-products', [
    'allProducts' => $allProducts,
    'pagination' => $pagination,
    'productsFind' => $productsFind,
]) ?>


<section class="shop-category">
    <div class="container">

        <?php echo $this->render('popular-products', [
            'popularProducts' => $popularProducts,
            'productsFind' => $productsFind,
        ]) ?>

        <?php echo $this->render('popular-categories', [
            'popularCategories' => $popularCategories,
            'categoriesFind' => $categoriesFind,
        ]) ?>

    </div>
</section>
