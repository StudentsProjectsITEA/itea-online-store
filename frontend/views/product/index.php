<?php

use common\models\ProductSearch;

/**
 * @var $this yii\web\View
 * @var $allCategories array
 * @var $allBrands array
 * @var $dataProvider ProductSearch
 */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

var_dump($dataProvider);

?>

<section class="category-block container">

<?php echo $this->render('filters', [
    'allCategories' => $allCategories,
    'allBrands' => $allBrands,
]) ?>

<?php echo $this->render('listing-products', [
    'dataProvider' => $dataProvider,
]) ?>
