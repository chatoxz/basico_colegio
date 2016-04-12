<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cobro".
 *
 * @property integer $id_cobro
 * @property integer $id_alumno
 * @property integer $id_factura
 * @property integer $id_recibo
 * @property integer $id_forma_pago
 * @property string $concepto
 * @property double $monto
 * @property string $observacion
 * @property string $fecha
 * @property string $mes
 * @property string $anio
 *
 * @property Alumno $idAlumno
 * @property Factura $idFactura
 * @property FormaPago $idFormaPago
 * @property Recibo $idRecibo
 */
class Cobro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno', 'id_factura'], 'required'],
            [['id_alumno', 'id_factura', 'id_recibo', 'id_forma_pago'], 'integer'],
            [['monto'], 'number'],
            [['fecha'], 'safe'],
            [['concepto'], 'string', 'max' => 105],
            [['observacion'], 'string', 'max' => 100],
            [['mes', 'anio'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cobro' => 'Id Cobro',
            'id_alumno' => 'Id Alumno',
            'id_factura' => 'Id Factura',
            'id_recibo' => 'Id Recibo',
            'id_forma_pago' => 'Id Forma Pago',
            'concepto' => 'Concepto',
            'monto' => 'Monto',
            'observacion' => 'Observacion',
            'fecha' => 'Fecha',
            'mes' => 'Mes',
            'anio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id_alumno' => 'id_alumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFactura()
    {
        return $this->hasOne(Factura::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFormaPago()
    {
        return $this->hasOne(FormaPago::className(), ['id_forma_pago' => 'id_forma_pago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRecibo()
    {
        return $this->hasOne(Recibo::className(), ['id_recibo' => 'id_recibo']);
    }
}
