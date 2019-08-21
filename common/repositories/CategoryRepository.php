<?php

namespace common\repositories;

use Yii;
use common\components\CategoryViewer;
use common\models\Category;
use common\models\Product;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\di\NotInstantiableException;
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

    /**
     * @return array|Category[]|ActiveRecord[]
     *
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function findPopularCategories()
    {
        $limit = Yii::$app->params['countOfPopularCategories'];
        $categoryViewer = Yii::$container->get(CategoryViewer::class);

        $categories = [];

        foreach (Product::find()->all() as $product) {
            $categories[] = $product->category->name;
        }

        $categories = array_count_values($categories);
        arsort($categories);

        $categories = array_slice($categories, 0, $limit);

        $popularCategories = [];

        foreach ($categories as $category => $count) {
            $popularCategories[$category]['count'] = $count;
            $popularCategories[$category]['end'] = $categoryViewer->getEndings($count);
        }

        return $popularCategories;
    }

    /**
     * @return string
     *
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function findAllCategories()
    {
        // Based on Product table
        // In case base on Category table use $allCategories = Category::find()->all()
        $allProducts = Product::find()->all();
        $categoryViewer = Yii::$container->get(CategoryViewer::class);

        $category = [];
        foreach ($allProducts as $item) {
            $cat = $this->findCategoryNameById($item['category_id']);
            if (! array_key_exists($cat , $category)) {
                $category[$cat]['count'] = 1;
            } else {
                $category[$cat]['count'] = $category[$cat]['count'] + 1;
            }
        }

        $category = $categoryViewer->getEndings($category);

        return $category;
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function findCategoryNameById(string $id)
    {
        return Category::findOne($id)->name;
    }
}
