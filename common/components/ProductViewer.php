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
    /* @var ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        $products = $this->productRepository->findAllProducts();

        return $products;
    }

    public function getProductsWithPagination($orderBy = '')
    {
        if ('' === $orderBy) {
            $orderBy = Yii::$app->params['productsOrderBy'];
        }

        $productsCount = Product::find()->count();
        $paginationLimit = Yii::$app->params['countOfPopularCategories'];


        $pagination = new Pagination([
            'defaultPageSize' => $paginationLimit,
            'totalCount' => $productsCount,
        ]);

        $allProducts = $this->productRepository->findAllProductsWithLimit($pagination, $orderBy);

        return [$allProducts, $pagination];
    }
}
