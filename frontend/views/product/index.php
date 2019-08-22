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
isset($param['search'])
    ? $this->params['breadcrumbs'][] = 'Search for: ' . $param['search']
    : null;
isset($param['minPrice']) && isset($param['maxPrice'])
    ? $this->params['breadcrumbs'][] = 'Search for price: from ' . $param['minPrice'] . ' UAH to ' . $param['maxPrice'] . ' UAH'
    : null;

//var_dump($dataProvider);

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
