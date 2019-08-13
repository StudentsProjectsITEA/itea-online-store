<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @package frontend\models
 */
class Category extends ActiveRecord
{

    private static $categories;
    private static $count;

    /**
     * @return string
     */
    public static function tableName ()
    {
        return '{{category}}';
    }

    /**
     * @return array
     */
    public static function getCategories()
    {
        $categories = Category::find()
            ->asArray()
            ->all();

        self::$categories = $categories;

        $allSubCategories = [];

        $count = count($categories);
        self::$count = $count;

        for ($i = 0; $i < $count; $i++) {
            if (1 == $categories[$i]['depth']) {
                $allSubCategories[$categories[$i]['name']] = $categories[$i]['id'];
            }
        }

        return $allSubCategories;
    }

    /**
     * @param $allSubCategories
     * @return array
     */
    public static function getSubcategories($allSubCategories) {

        $allCategories = [];

        for ($i = 0; $i < self::$count; $i++) {

            $key = array_search(self::$categories[$i]['parent_id'] , $allSubCategories);

            if ($key) {
                $allCategories[$key][] = self::$categories[$i]['name'];
            }
        }

        return $allCategories;
    }
}
