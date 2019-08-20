<?php

namespace frontend\repositories;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\db\ActiveRecord;

/**
 * Class PopularRepository
 * @package frontend\repositories
 */
class PopularRepository
{
    /**
     * @return array|Product[]|ActiveRecord[]
     */
    public function findPopularProducts()
    {
        $limit = Yii::$app->params['countOfPopularProducts'];

        $popularProducts = Product::find()
            ->orderBy(['quantity' => SORT_DESC])
            ->limit($limit)
            ->all();

        return $popularProducts;
    }

    /**
     * @return array|Category[]|ActiveRecord[]
     */
    public function findPopularCategories()
    {
        $limit = Yii::$app->params['countOfPopularCategories'];

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
            $popularCategories[$category]['end'] = $this->getEndings($count);
        }

        return $popularCategories;
    }

    /**
     * @param string $category
     * @return string $category
     */
    public function getEndings($category)
    {
        $n = substr($category, - 1);
        if (1 == $n) {
            $end =  'товар';
        } elseif ((2 == $n) || (3 == $n) || (4 == $n)) {
            $end =  'товара';
        } else {
            $end = 'товаров';
        }

        return $end;
    }

    /**
     * @return string
     */
    public function findAllCategories()
    {
        // Based on Product table
        // In case base on Category table use $allCategories = Category::find()->all()
        $allProducts = Product::find()->all();

        $category = [];
        foreach ($allProducts as $item) {
            $cat = $this->getCategoryById($item['category_id']);
            if (! array_key_exists($cat , $category)) {
                $category[$cat]['count'] = 1;
            } else {
                $category[$cat]['count'] = $category[$cat]['count'] + 1;
            }
        }

        $category = $this->getEndings($category);

        return $category;
    }

    /**
     * @param $id
     * @return string
     */
    public function getCategoryById($id)
    {
        return Category::findOne($id)->name;
    }
}
