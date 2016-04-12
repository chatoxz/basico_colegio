<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id_persona
 * @property string $nombre
 * @property string $apellido
 * @property integer $documento
 * @property string $tipo_documento
 * @property string $domicilio
 * @property string $telefono
 * @property string $celular
 * @property string $fecha_nacimiento
 * @property string $foto
 * @property string $localidad
 * @property string $provinicia
 * @property integer $codigo_postal
 * @property string $estado_civil
 * @property string $observacion
 *
 * @property Alumno[] $alumnos
 * @property Docente[] $docentes
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documento', 'codigo_postal'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 250],
            [['tipo_documento', 'estado_civil'], 'string', 'max' => 45],
            [['domicilio', 'observacion'], 'string', 'max' => 255],
            [['telefono', 'celular'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 150],
            [['localidad', 'provinicia'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona' => 'Id Persona',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'documento' => 'Documento',
            'tipo_documento' => 'Tipo Documento',
            'domicilio' => 'Domicilio',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'foto' => 'Foto',
            'localidad' => 'Localidad',
            'provinicia' => 'Provinicia',
            'codigo_postal' => 'Codigo Postal',
            'estado_civil' => 'Estado Civil',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['id_persona' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['id_persona' => 'id_persona']);
    }
}
