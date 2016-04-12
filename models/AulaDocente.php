<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula_docente".
 *
 * @property integer $id_aula_docente
 * @property integer $id_docente
 * @property integer $id_aula
 *
 * @property Aula $idAula
 * @property Docente $idDocente
 */
class AulaDocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aula_docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_docente', 'id_aula'], 'required'],
            [['id_docente', 'id_aula'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aula_docente' => 'Id Aula Docente',
            'id_docente' => 'Id Docente',
            'id_aula' => 'Id Aula',
        ];
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
    public function getIdDocente()
    {
        return $this->hasOne(Docente::className(), ['id_docente' => 'id_docente']);
    }
}
