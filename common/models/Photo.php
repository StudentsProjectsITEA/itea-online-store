<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%photo}}".
 *
 * @property string $id
 * @property string $name
 * @property bool $is_main
 * @property int $created_time
 * @property string $product_id
 *
 * @property Product $product
 */
class Photo extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%photo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'is_main', 'created_time', 'product_id'], 'required'],
            [['id', 'product_id'], 'string'],
            [['is_main'], 'boolean'],
            [['created_time'], 'default', 'value' => null],
            [['created_time'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['id'], 'unique'],
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
            'name' => 'Name',
            'is_main' => 'Is Main',
            'created_time' => 'Created Time',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
