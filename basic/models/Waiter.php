<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waiter".
 *
 * @property integer $id
 * @property string $waiter_name
 *
 * @property Service[] $services
 */
class Waiter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waiter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waiter_name'], 'required'],
            [['waiter_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'waiter_name' => 'Имя официанта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['waiter_id' => 'id']);
    }
}
