<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 * @property string $parent_id
 * @property int $depth
 *
 * @property CategoryParam[] $categoryParams
 * @property Product[] $products
 */
class Category extends ActiveRecord
{
    private static $categories;
    private static $count;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'depth'], 'required'],
            [['id', 'parent_id'], 'string'],
            [['depth'], 'default', 'value' => null],
            [['depth'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'depth' => 'Depth',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategoryParams()
    {
        return $this->hasMany(CategoryParam::class, ['category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getCategories()
    {
        $categories = \common\models\Category::find()
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
