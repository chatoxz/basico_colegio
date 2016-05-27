<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $id_alumno
 * @property integer $id_persona
 * @property integer $id_obra_social
 * @property integer $id_aula
 * @property string $fecha_ingreso
 * @property string $numero_acta
 * @property string $tipo_transporte
 * @property string $nombre_transporte
 * @property string $tel_transporte
 * @property string $fecha_vencimiento_certificado
 * @property string $fecha_inicio_certificado
 * @property string $numero_afiliado
 *
 * @property Aula $idAula
 * @property ObraSocial $idObraSocial
 * @property Persona $idPersona
 * @property AlumnoTutor[] $alumnoTutors
 * @property Cobro[] $cobros
 */
class Alumno extends \yii\db\ActiveRecord
{
    public $full_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona', 'id_aula'], 'required'],
            [['id_persona', 'id_obra_social', 'id_aula'], 'integer'],
            [['fecha_ingreso', 'fecha_vencimiento_certificado', 'fecha_inicio_certificado','id_obra_social', 'full_name'], 'safe'],
            [['numero_acta'], 'string', 'max' => 255],
            [['tipo_transporte', 'nombre_transporte', 'tel_transporte'], 'string', 'max' => 45],
            [['numero_afiliado'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alumno' => 'Id Alumno',
            'id_persona' => 'Id Persona',
            'fullName'=>Yii::t('app', 'Nombre y Apellido'),
            'id_obra_social' => 'Id Obra Social',
            'id_aula' => 'Id Aula',
            'fecha_ingreso' => 'Fecha de Ingreso',
            'numero_acta' => 'Número Acta',
            'tipo_transporte' => 'Tipo de Transporte',
            'nombre_transporte' => 'Nombre de Transporte',
            'tel_transporte' => 'Teléfono de Transporte',
            'fecha_vencimiento_certificado' => 'Fecha de Vencimiento Certificado',
            'fecha_inicio_certificado' => 'Fecha de Inicio Certificado',
            'numero_afiliado' => 'Número de Afiliado',
        ];
    }

    public function getFullName() {
        return $this->idPersona->nombre." ".$this->idPersona->apellido;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAula()
    {
        return $this->hasOne(Aula::className(), ['id_aula' => 'id_aula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdObraSocial()
    {
        return $this->hasOne(ObraSocial::className(), ['id_obra_social' => 'id_obra_social']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoTutors()
    {
        return $this->hasMany(AlumnoTutor::className(), ['id_alumno' => 'id_alumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobros()
    {
        return $this->hasMany(Cobro::className(), ['id_alumno' => 'id_alumno']);
    }
}
