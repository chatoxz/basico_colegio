<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlumnoTutor;

/**
 * AlumnoTutorSearch represents the model behind the search form about `app\models\AlumnoTutor`.
 */
class AlumnoTutorSearch extends AlumnoTutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno_tutor', 'id_alumno', 'id_tutor'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AlumnoTutor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_alumno_tutor' => $this->id_alumno_tutor,
            'id_alumno' => $this->id_alumno,
            'id_tutor' => $this->id_tutor,
        ]);

        return $dataProvider;
    }
}
