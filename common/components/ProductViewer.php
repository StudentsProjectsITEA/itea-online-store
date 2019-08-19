<?php

namespace common\components;

use common\models\Product;
use common\repositories\ProductRepository;
use Yii;
use yii\data\Pagination;

/**
 * Class CategoryViewer
 *
 * @package common\components
 */
class ProductViewer
{
    public static function getAllProducts()
    {
        $products = (new ProductRepository)->findAllProducts();

        return $products;
    }

    public static function getProductsWithPagination($orderBy = '')
    {
        if ('' === $orderBy) {
            $orderBy = Yii::$app->params['productsOrderBy'];
        }

        $productsCount = Product::find()->count();
        $paginationlimit = Yii::$app->params['countOfPopularCategories'];

        $pagination = new Pagination([
            'defaultPageSize' => $paginationlimit,
            'totalCount' => $productsCount,
        ]);

        $allProducts = Product::find()->orderBy($orderBy)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return array($allProducts, $pagination);
    }
}
