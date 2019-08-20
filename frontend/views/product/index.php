<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $searchModel common\models\ProductSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 *
 * @var $allProducts
 * @var $allBrands
 * @var $allCategories
 * @var $pagination
 * @var $productsFind
 */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="category-block container">

<?php echo $this->render('filters', [
    'allCategories' => $allCategories,
    'allBrands' => $allBrands,
]) ?>

<?php echo $this->render('listing-products', [
    'allProducts' => $allProducts,
    'pagination' => $pagination,
    'productsFind' => $productsFind,
]) ?>
