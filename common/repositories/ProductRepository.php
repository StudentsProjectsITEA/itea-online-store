<?php

namespace common\repositories;

use common\models\Product;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Class ProductRepository
 *
 * @package common\repositories
 */
class ProductRepository
{
    /**
     * @param $id
     *
     * @return Product|null
     *
     * @throws NotFoundHttpException
     */
    public function findProductById($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested product does not exist.');
    }

    /**
     * @param $id
     *
     * @return array|Product|ActiveRecord|null
     *
     * @throws NotFoundHttpException
     */
    public function findBrandByBrandId($id)
    {
        if (($model = (new Product)->getBrand()->select(['name'])
            ->where(['id' => $id])
            ->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested product does not exist.');
    }


}
