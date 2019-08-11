<?php

namespace common\models;

use Yii;

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
class CategoryParam extends \yii\db\ActiveRecord
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
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => Param::className(), 'targetAttribute' => ['param_id' => 'id']],
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
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::className(), ['id' => 'param_id']);
    }
}

