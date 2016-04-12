<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cobro;

/**
 * CobroSearch represents the model behind the search form about `app\models\Cobro`.
 */
class CobroSearch extends Cobro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cobro', 'id_alumno', 'id_factura', 'id_recibo', 'id_forma_pago'], 'integer'],
            [['concepto', 'observacion', 'fecha', 'mes', 'anio'], 'safe'],
            [['monto'], 'number'],
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
        $query = Cobro::find();

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
            'id_cobro' => $this->id_cobro,
            'id_alumno' => $this->id_alumno,
            'id_factura' => $this->id_factura,
            'id_recibo' => $this->id_recibo,
            'id_forma_pago' => $this->id_forma_pago,
            'monto' => $this->monto,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'anio', $this->anio]);

        return $dataProvider;
    }
}
