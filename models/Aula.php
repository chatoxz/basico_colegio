<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property integer $id_aula
 * @property string $nombre
 * @property string $tipo
 *
 * @property Alumno[] $alumnos
 * @property AulaDocente[] $aulaDocentes
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aula' => 'Id Aula',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['id_aula' => 'id_aula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulaDocentes()
    {
        return $this->hasMany(AulaDocente::className(), ['id_aula' => 'id_aula']);
    }
}
