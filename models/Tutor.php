<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property integer $id_tutor
 * @property integer $id_persona
 * @property string $ocupacion
 * @property string $descripcion_ocupacion
 * @property string $relacion
 *
 * @property AlumnoTutor[] $alumnoTutors
 * @property Persona $idPersona
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona'], 'required'],
            [['id_persona'], 'integer'],
            [['ocupacion', 'descripcion_ocupacion'], 'string', 'max' => 255],
            [['relacion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tutor' => 'Id Tutor',
            'id_persona' => 'Id Persona',
            'ocupacion' => 'Ocupación',
            'descripcion_ocupacion' => 'Descripción',
            'relacion' => 'Relación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoTutors()
    {
        return $this->hasMany(AlumnoTutor::className(), ['id_tutor' => 'id_tutor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['id_persona' => 'id_persona']);
    }
}
