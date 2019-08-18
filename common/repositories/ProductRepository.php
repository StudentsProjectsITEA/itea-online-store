<?php

namespace common\repositories;

use common\models\Category;
use common\models\Product;
use common\models\ProductParamValue;
use yii\web\NotFoundHttpException;

class ProductRepository
{
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findProductById(string $id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function findProductParentCategoryName(string $id): string
    {
        return Category::findOne($id)->name;
    }

    /**
     * @param string $id
     *
     * @return array
     */
    public function findAllProductParamValuesById(string $id): array
    {
        return ProductParamValue::findAll(['product_id' => $id]);
    }
}