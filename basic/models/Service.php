<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property integer $order_id
 * @property integer $waiter_id
 *
 * @property NumberOrder $order
 * @property Waiter $waiter
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'waiter_id'], 'required'],
            [['order_id', 'waiter_id'], 'integer'],
            [['order_id'], 'unique'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => NumberOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['waiter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Waiter::className(), 'targetAttribute' => ['waiter_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'waiter_id' => 'Waiter ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(NumberOrder::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaiter()
    {
        return $this->hasOne(Waiter::className(), ['id' => 'waiter_id']);
    }
}
