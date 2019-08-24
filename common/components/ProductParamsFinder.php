<?php

namespace common\components;

use common\models\Brand;
use common\models\Category;
use common\models\Product;
use common\models\ProductParamValue;

/**
 * Class ProductParamsFinder
 * @package common\components
 */
class ProductParamsFinder
{
    private $params = [];
    private $colorValues = [];
    private $sizeValues = [];

    /**
     * @param array $array
     */
    public function recordProductParams(array $array)
    {
        /** @var ProductParamValue $productParamValue */
        foreach ($array as $productParamValue) {
            if ($productParamValue->param->name === 'Color') {
                $this->colorValues[] = $productParamValue->value;
            } elseif ($productParamValue->param->name === 'Size') {
                $this->sizeValues[] = $productParamValue->value;
            } else {
                $this->params[$productParamValue->param->name] = $productParamValue->value;
            }
        }
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getColorValues(): array
    {
        return $this->colorValues;
    }

    /**
     * @return array
     */
    public function getSizeValues(): array
    {
        return $this->sizeValues;
    }

    public function getCategoriesIdFromParams($params)
    {
        $categories = Category::find()->asArray()->all();

        $findProductsByCategory = [];

        foreach ($categories as $subCategory) {
            if(array_key_exists ( $subCategory['name'], $params )) {
                foreach ($categories as $item) {
                    if ($item['parent_id'] == $subCategory['id']) {
                        $findProductsByCategory[] = $item['id'];
                    }
                }
            }
        }

        return $findProductsByCategory;
    }

    public function getBrandsIdFromParams($params)
    {
        $brands = Brand::find()->asArray()->all();

        $findBrands = [];

        foreach ($brands as $brand) {
            if(array_key_exists ( $brand['name'], $params )) {
                $findBrands[] = $brand['id'];
            }
        }

        $findProductsByBrand = Product::findAll(['brand_id' => $findBrands]);

        return $findProductsByBrand;
    }
}
