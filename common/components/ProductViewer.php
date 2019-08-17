<?php

namespace common\components;

use common\repositories\ProductRepository;

/**
 * Class CategoryViewer
 *
 * @package common\components
 */
class ProductViewer
{
    public static function getAllProducts ()
    {
        $allProducts = [];
        $products = (new ProductRepository)->findAllProducts();
        $count = count($products);
        return $products;
    }
}