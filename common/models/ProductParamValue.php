<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%product_param_value}}".
 *
 * @property string $id
 * @property string $value
 * @property string $product_id
 * @property string $param_id
 *
 * @property Param $param
 * @property Product $product
 */
class ProductParamValue extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_param_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'value', 'product_id', 'param_id'], 'required'],
            [['id', 'product_id', 'param_id'], 'string'],
            [['value'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => Param::class, 'targetAttribute' => ['param_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'product_id' => 'Product ID',
            'param_id' => 'Param ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::class, ['id' => 'param_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
