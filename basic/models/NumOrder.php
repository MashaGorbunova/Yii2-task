<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "numberOrder".
 *
 * @property integer $id
 * @property integer $number_order
 *
 * @property Orders[] $orders
 * @property Service $service
 */
class NumOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'numberOrder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_order'], 'required'],
            [['number_order'], 'integer'],
            [['number_order'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_order' => 'Количество заказов',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['orders' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['order_id' => 'id']);
    }
}
