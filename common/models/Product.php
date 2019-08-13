<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property int $quantity
 * @property int $price
 * @property string $main_photo
 * @property bool $is_deleted
 * @property int $created_time
 * @property int $updated_time
 * @property string $category_id
 * @property string $brand_id
 *
 * @property Photo[] $photos
 * @property Brand $brand
 * @property Category $category
 * @property ProductOrder[] $productOrders
 * @property ProductParamValue[] $productParamValues
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description', 'quantity', 'price', 'main_photo', 'is_deleted', 'created_time', 'updated_time', 'category_id', 'brand_id'], 'required'],
            [['id', 'description', 'category_id', 'brand_id'], 'string'],
            [['quantity', 'price', 'created_time', 'updated_time'], 'default', 'value' => null],
            [['quantity', 'price', 'created_time', 'updated_time'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['title', 'main_photo'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['id'], 'unique'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'main_photo' => 'Main Photo',
            'is_deleted' => 'Is Deleted',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
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
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::class, ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductParamValues()
    {
        return $this->hasMany(ProductParamValue::class, ['product_id' => 'id']);
    }
}
