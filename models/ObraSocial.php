<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obra_social".
 *
 * @property integer $id_obra_social
 * @property string $nombre
 * @property string $sigla
 * @property double $cuota
 * @property string $domicilio
 * @property string $localidad
 * @property string $telefono
 * @property string $email
 * @property string $web
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
            [['nombre'], 'required'],
            [['cuota'], 'number'],
            [['nombre', 'observacion'], 'string', 'max' => 255],
            [['sigla', 'domicilio', 'localidad', 'email'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['web'], 'string', 'max' => 100]
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
            'sigla' => 'Sigla',
            'cuota' => 'Cuota',
            'domicilio' => 'Domicilio',
            'localidad' => 'Localidad',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'web' => 'Web',
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
