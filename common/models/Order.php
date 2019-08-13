<?php

namespace common\models;

use frontend\models\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property string $id
 * @property int $status_id
 * @property int $payment_id
 * @property int $shipping_id
 * @property string $shipping_address
 * @property int $created_time
 * @property int $updated_time
 * @property string $user_id
 *
 * @property User $user
 * @property ProductOrder[] $productOrders
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'payment_id', 'shipping_id', 'shipping_address', 'created_time', 'updated_time', 'user_id'], 'required'],
            [['id', 'user_id'], 'string'],
            [['status_id', 'payment_id', 'shipping_id', 'created_time', 'updated_time'], 'default', 'value' => null],
            [['status_id', 'payment_id', 'shipping_id', 'created_time', 'updated_time'], 'integer'],
            [['shipping_address'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'payment_id' => 'Payment ID',
            'shipping_id' => 'Shipping ID',
            'shipping_address' => 'Shipping Address',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::class, ['order_id' => 'id']);
    }
}
