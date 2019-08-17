<?php

namespace common\repositories;

use common\models\Product;
use yii\db\ActiveRecord;
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
    public function findProductById($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @return array|Product[]|ActiveRecord[]
     */
    public function findAllProducts()
    {
        return Product::find()
            ->asArray()
            ->all();
    }
}
