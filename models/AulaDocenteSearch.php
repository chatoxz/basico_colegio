<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AulaDocente;

/**
 * AulaDocenteSearch represents the model behind the search form about `app\models\AulaDocente`.
 */
class AulaDocenteSearch extends AulaDocente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[[], 'integer'],
            [['id_docente','id_aula_docente',  'id_aula'], 'safe'],

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
        $query = AulaDocente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idAula');
        $query->joinWith('idDocente.idPersona');

        $query->andFilterWhere([
            'id_aula_docente' => $this->id_aula_docente,
        ]);

        $query->andFilterWhere(['like', 'persona.nombre' , $this->id_docente]);
        $query->andFilterWhere(['like', 'aula.nombre' , $this->id_aula]);

        return $dataProvider;
    }
}
