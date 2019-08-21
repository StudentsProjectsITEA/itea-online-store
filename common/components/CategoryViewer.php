<?php

namespace common\components;

use common\repositories\CategoryRepository;

/**
 * Class CategoryViewer
 *
 * @package common\components
 */
class CategoryViewer
{
    private static $categories;
    private static $count;

    /**
     * @return array
     */
    public function getSubCategories()
    {
        $allSubCategories = [];
        self::$categories = (new CategoryRepository())->findCategories();
        self::$count = count(self::$categories);

        for ($i = 0; $i < self::$count; $i++) {
            if (1 == self::$categories[$i]['depth']) {
                $allSubCategories[self::$categories[$i]['name']] = self::$categories[$i]['id'];
            }
        }

        return $allSubCategories;
    }

    /**
     * @param $allSubCategories
     *
     * @return array
     */
    public function getCategories($allSubCategories)
    {
        $allCategories = [];

        for ($i = 0; $i < self::$count; $i++) {
            $key = array_search(self::$categories[$i]['parent_id'], $allSubCategories);
            if ($key) {
                $allCategories[$key][] = self::$categories[$i]['name'];
            }
        }

        return $allCategories;
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
}
