<?php

namespace common\repositories;

use common\models\Category;
use yii\db\ActiveRecord;

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
}
