<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $dish_name
 * @property string $dish_category
 * @property double $dish_cost
 *
 * @property Orders[] $orders
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_name', 'dish_category', 'dish_cost'], 'required'],
            [['dish_cost'], 'number'],
            [['dish_name', 'dish_category'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_name' => 'Название блюда',
            'dish_category' => 'Категория блюда',
            'dish_cost' => 'Стоимость блюда',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['dish_id' => 'id']);
    }
}
