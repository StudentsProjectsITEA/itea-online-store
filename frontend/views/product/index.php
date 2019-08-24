<?php

use common\models\ProductSearch;

/**
 * @var $this yii\web\View
 * @var $allCategories array
 * @var $allBrands array
 * @var $dataProvider ProductSearch
 */

$param = Yii::$app->request->queryParams;
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
! empty($param['search'])
    ? $this->params['breadcrumbs'][] = 'Search for: ' . $param['search']
    : null;
! empty($param['minPrice']) && ! empty($param['maxPrice'])
    ? $this->params['breadcrumbs'][] = 'Search for price: from ' . $param['minPrice'] . ' UAH to ' . $param['maxPrice'] . ' UAH'
    : null;

?>

<section class="category-block container">
    <?php echo $this->render('filters', [
        'allCategories' => $allCategories,
        'allBrands' => $allBrands,
    ]) ?>

    <?php echo $this->render('listing-products', [
        'dataProvider' => $dataProvider,
    ]) ?>
</section>
