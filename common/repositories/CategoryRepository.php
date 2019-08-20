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
     * @return array|Category[]|ActiveRecord[]
     */
    public function getMainCategories()
    {
        return Category::find()
            ->where(['depth' => 1])
            ->all();
    }

    /**
     * @return array|Category[]|ActiveRecord[]
     */
    public function getMinorCategories()
    {
        return Category::find()
            ->where(['depth' => 2])
            ->all();
    }

    /**
     * @return array
     */
    public function getAllCategories()
    {
        $mainCategories = $this->getMainCategories();
        $minorCategories = $this->getMinorCategories();

        $allCategoriesArray = [];

        foreach ($mainCategories as $mainCategory) {
            foreach ($minorCategories as $minorCategory) {
                if ($mainCategory->id == $minorCategory->parent_id) {
                    $allCategoriesArray[$mainCategory->name][] = $minorCategory;
                }
            }
        }

        return $allCategoriesArray;
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

    /**
     * @param string $name
     *
     * @return Category|null
     */
    public function findCategoryByName(string $name)
    {
        return Category::findOne(['name' => $name]);
    }
}
