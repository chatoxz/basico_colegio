<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forma_pago".
 *
 * @property integer $id_forma_pago
 * @property string $tipo_pago
 * @property string $nombre_banco
 * @property string $numero_cheque
 * @property string $numero_cuenta
 * @property string $observacion
 *
 * @property Cobro[] $cobros
 */
class FormaPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forma_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_pago', 'nombre_banco', 'numero_cheque', 'numero_cuenta'], 'string', 'max' => 45],
            [['observacion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_forma_pago' => 'Id Forma Pago',
            'tipo_pago' => 'Tipo Pago',
            'nombre_banco' => 'Nombre Banco',
            'numero_cheque' => 'Numero Cheque',
            'numero_cuenta' => 'Numero Cuenta',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobros()
    {
        return $this->hasMany(Cobro::className(), ['id_forma_pago' => 'id_forma_pago']);
    }
}
