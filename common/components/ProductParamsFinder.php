<?php

namespace common\components;

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
}
