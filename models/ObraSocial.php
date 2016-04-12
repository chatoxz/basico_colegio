<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obra_social".
 *
 * @property integer $id_obra_social
 * @property string $nombre
 * @property integer $cuota
 * @property string $observacion
 *
 * @property Alumno[] $alumnos
 */
class ObraSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obra_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cuota'], 'integer'],
            [['nombre', 'observacion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_obra_social' => 'Id Obra Social',
            'nombre' => 'Nombre',
            'cuota' => 'Cuota',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['id_obra_social' => 'id_obra_social']);
    }
}
