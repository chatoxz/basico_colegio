<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property integer $id_factura
 * @property integer $id_factura_reemplazo
 * @property string $fecha_factura
 * @property integer $numero
 * @property integer $cancelada
 * @property string $observacion
 *
 * @property Cobro[] $cobros
 * @property Factura $idFacturaReemplazo
 * @property Factura[] $facturas
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_factura_reemplazo', 'numero', 'cancelada'], 'integer'],
            [['fecha_factura'], 'safe'],
            [['observacion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_factura' => 'Id Factura',
            'id_factura_reemplazo' => 'Id Factura Reemplazo',
            'fecha_factura' => 'Fecha Factura',
            'numero' => 'Numero',
            'cancelada' => 'Cancelada',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobros()
    {
        return $this->hasMany(Cobro::className(), ['id_factura' => 'id_factura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacturaReemplazo()
    {
        return $this->hasOne(Factura::className(), ['id_factura' => 'id_factura_reemplazo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['id_factura_reemplazo' => 'id_factura']);
    }
}
