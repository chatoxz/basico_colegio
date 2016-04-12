<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_alumno".
 *
 * @property integer $id_tipo_alumno
 * @property integer $id_alumno
 * @property string $nombre
 */
class TipoAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno'], 'required'],
            [['id_alumno'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_alumno' => 'Id Tipo Alumno',
            'id_alumno' => 'Id Alumno',
            'nombre' => 'Nombre',
        ];
    }
}
