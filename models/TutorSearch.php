<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tutor;

/**
 * TutorSearch represents the model behind the search form about `app\models\Tutor`.
 */
class TutorSearch extends Tutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tutor', 'id_persona'], 'integer'],
            [['ocupacion', 'descripcion_ocupacion', 'relacion'], 'safe'],
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
        $query = Tutor::find();

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
            'id_tutor' => $this->id_tutor,
            'id_persona' => $this->id_persona,
        ]);

        $query->andFilterWhere(['like', 'ocupacion', $this->ocupacion])
            ->andFilterWhere(['like', 'descripcion_ocupacion', $this->descripcion_ocupacion])
            ->andFilterWhere(['like', 'relacion', $this->relacion]);

        return $dataProvider;
    }
}
