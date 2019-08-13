<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category_param".
 *
 * @property string $id
 * @property string $category_id
 * @property string $param_id
 *
 * @property Category $category
 * @property Param $param
 */
class CategoryParam extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'param_id'], 'required'],
            [['id', 'category_id', 'param_id'], 'string'],
            [['id'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => Param::class, 'targetAttribute' => ['param_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'param_id' => 'Param ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::class, ['id' => 'param_id']);
    }
}
