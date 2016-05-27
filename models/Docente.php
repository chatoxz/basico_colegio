<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id_docente
 * @property integer $id_persona
 * @property string $numero_boleta
 * @property string $cargo
 * @property string $fecha_ingreso
 * @property string $horarios
 * @property string $turno
 * @property string $turno_entrada_salida
 * @property string $observacion
 * @property string $tipo_docente
 *
 * @property AulaDocente[] $aulaDocentes
 * @property Persona $idPersona
 */
class Docente extends \yii\db\ActiveRecord
{
    public $full_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona'], 'integer'],
            [['fecha_ingreso','full_name'], 'safe'],
            [['numero_boleta', 'cargo', 'tipo_docente'], 'string', 'max' => 50],
            [['horarios', 'observacion'], 'string', 'max' => 255],
            [['turno'], 'string', 'max' => 45],
            [['turno_entrada_salida'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_docente' => 'Id Docente',
            'id_persona' => 'Id Persona',
            'fullName'=>Yii::t('app', 'Nombre y Apellido'),
            'numero_boleta' => 'Número Boleta',
            'cargo' => 'Cargo',
            'fecha_ingreso' => 'Fecha Ingreso',
            'horarios' => 'Horarios',
            'turno' => 'Turno',
            'turno_entrada_salida' => 'Turno Entrada y Salida',
            'observacion' => 'Observaciones',
            'tipo_docente' => 'Tipo de Docente',
        ];
    }

    public function getFullName() {
        return $this->idPersona->nombre." ".$this->idPersona->apellido;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaDocentes()
    {
        return $this->hasMany(AulaDocente::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona']);
    }
}
