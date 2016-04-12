<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recibo".
 *
 * @property integer $id_recibo
 *
 * @property Cobro[] $cobros
 */
class Recibo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recibo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_recibo' => 'Id Recibo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobros()
    {
        return $this->hasMany(Cobro::className(), ['id_recibo' => 'id_recibo']);
    }
}
