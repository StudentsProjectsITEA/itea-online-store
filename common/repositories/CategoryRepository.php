<?php

namespace common\repositories;

use common\models\Category;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Class CategoryRepository
 *
 * @package common\repositories
 */
class CategoryRepository
{
    /**
     * @return array|Category[]|ActiveRecord[]
     */
    public function findCategories()
    {
        return Category::find()
            ->asArray()
            ->all();
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     *
     * @return Category the loaded model
     * @throws NotFoundHttpException
     */
    public function findCategoryById($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
