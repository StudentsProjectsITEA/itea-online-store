<?php

namespace frontend\repositories;

use common\models\Category;
use common\models\Product;
use Yii;

/**
 * Class PopularRepository
 * @package frontend\repositories
 */
class PopularRepository
{
    /**
     * @return array|Product[]|\yii\db\ActiveRecord[]
     */
    public static function findPopularProducts()
    {
        $limit = Yii::$app->params['countOfPopularProducts'];

        $popularProducts = Product::find()
            ->orderBy(['quantity' => SORT_DESC])
            ->limit($limit)
            ->all();

        return $popularProducts;
    }

    /**
     * @return array|Category[]|\yii\db\ActiveRecord[]
     */
    public static function findPopularCategories()
    {
        $limit = Yii::$app->params['countOfPopularCategories'];

        $popularCategories = Product::find()
            ->orderBy(['quantity' => SORT_DESC])
            ->limit($limit)
            ->all();

        return $popularCategories;
    }

    /**
     * @return array
     */
    public static function findAllCategories()
    {
        // Based on Product table
        // In case base on Category table use $allCategories = Category::find()->all()
        $allProducts = Product::find()->all();

        $category = [];
        foreach ($allProducts as $item) {
            $cat = self::getCategoryById($item['category_id']);
            if (! array_key_exists($cat , $category)) {
                $category[$cat]['count'] = 1;
            } else {
                $category[$cat]['count'] = $category[$cat]['count'] + 1;
            }
        }

        $category = self::getEndings($category);

        return $category;
    }

    /**
     * @param $id
     * @return string
     */
    public static function getCategoryById($id)
    {
        return Category::findOne($id)->name;
    }

    /**
     * @param array $category
     * @return array $category
     */
    public static function getEndings($category)
    {
        foreach ($category as $key => $val) {
            $n = substr($val['count'], - 1);
            if (1 == $n) {
                $category[$key]['end'] = 'товар';
            } elseif ((2 == $n) || (3 == $n) || (4 == $n)) {
                $category[$key]['end'] = 'товара';
            } else {
                $category[$key]['end'] = 'товаров';
            }
        }

        return $category;
    }
}
