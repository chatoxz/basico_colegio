<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno_tutor".
 *
 * @property integer $id_alumno_tutor
 * @property integer $id_alumno
 * @property integer $id_tutor
 *
 * @property Tutor $idTutor
 * @property Alumno $idAlumno
 */
class AlumnoTutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno_tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno', 'id_tutor'], 'required'],
            [['id_alumno', 'id_tutor'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alumno_tutor' => 'Id Alumno Tutor',
            'id_alumno' => 'Id Alumno',
            'id_tutor' => 'Id Tutor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTutor()
    {
        return $this->hasOne(Tutor::className(), ['id_tutor' => 'id_tutor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id_alumno' => 'id_alumno']);
    }
}
