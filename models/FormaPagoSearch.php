<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormaPago;

/**
 * FormaPagoSearch represents the model behind the search form about `app\models\FormaPago`.
 */
class FormaPagoSearch extends FormaPago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_forma_pago'], 'integer'],
            [['tipo_pago', 'nombre_banco', 'numero_cheque', 'numero_cuenta', 'observacion'], 'safe'],
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
        $query = FormaPago::find();

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
            'id_forma_pago' => $this->id_forma_pago,
        ]);

        $query->andFilterWhere(['like', 'tipo_pago', $this->tipo_pago])
            ->andFilterWhere(['like', 'nombre_banco', $this->nombre_banco])
            ->andFilterWhere(['like', 'numero_cheque', $this->numero_cheque])
            ->andFilterWhere(['like', 'numero_cuenta', $this->numero_cuenta])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
