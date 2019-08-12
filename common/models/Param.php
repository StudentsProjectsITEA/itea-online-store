<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "param".
 *
 * @property string $id
 * @property string $name
 * @property int $type_id
 * @property bool $is_required
 *
 * @property CategoryParam[] $categoryParams
 * @property ProductParamValue[] $productParamValues
 */
class Param extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type_id', 'is_required'], 'required'],
            [['id'], 'string'],
            [['type_id'], 'default', 'value' => null],
            [['type_id'], 'integer'],
            [['is_required'], 'boolean'],
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
            'type_id' => 'Type ID',
            'is_required' => 'Is Required',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryParams()
    {
        return $this->hasMany(CategoryParam::class, ['param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParamValues()
    {
        return $this->hasMany(ProductParamValue::class, ['param_id' => 'id']);
    }
}
