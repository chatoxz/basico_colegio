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
            [['id_aula_docente',  'id_aula'], 'integer'],
            [['id_docente'], 'safe'],

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

        $query->andFilterWhere([
            'id_aula_docente' => $this->id_aula_docente,
            'id_docente' => $this->id_docente,
            'id_aula' => $this->id_aula,
        ]);
        $query->joinWith('idDocente');
        $query->joinWith('idDocente.idPersona');
        
        //$query->andFilterWhere(['like', 'persona.nombre' , $this->id_persona]);
        return $dataProvider;
    }
}
