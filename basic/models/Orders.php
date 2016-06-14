<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $orders
 * @property integer $dish_id
 *
 * @property NumberOrder $orders0
 * @property Dish $dish
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders', 'dish_id'], 'required'],
            [['orders', 'dish_id'], 'integer'],
            [['orders'], 'exist', 'skipOnError' => true, 'targetClass' => NumberOrder::className(), 'targetAttribute' => ['orders' => 'id']],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders' => 'Заказы',
            'dish_id' => 'ID блюда',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasOne(NumberOrder::className(), ['id' => 'orders']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'dish_id']);
    }
}
