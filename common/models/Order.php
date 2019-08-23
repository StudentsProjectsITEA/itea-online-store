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
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_DONE = 3;

    const PAYMENT_BANK_TRANSFER = 1;
    const PAYMENT_CASH_RECEIPT = 2;
    const PAYMENT_CARD_ONLINE = 3;

    const SHIPPING_PICKUP = 1;
    const SHIPPING_COURIER = 2;
    const SHIPPING_POST_OFFICE = 3;

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
            [['id', 'status_id', 'payment_id', 'shipping_id', 'shipping_address', 'created_time', 'updated_time'], 'required'],
            [['id', 'user_id'], 'string'],
            [['status_id', 'payment_id', 'shipping_id', 'created_time', 'updated_time', 'user_id'], 'default', 'value' => null],
            [['status_id', 'payment_id', 'shipping_id', 'created_time', 'updated_time'], 'integer'],
            [['shipping_address'], 'string', 'max' => 255],
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
