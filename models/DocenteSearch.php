<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Docente;

/**
 * DocenteSearch represents the model behind the search form about `app\models\Docente`.
 */
class DocenteSearch extends Docente
{

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_docente'], 'integer'],
            [['id_persona','numero_boleta', 'cargo', 'fecha_ingreso', 'horarios', 'turno', 'turno_entrada_salida', 'observacion', 'tipo_docente','fullName'], 'safe'],
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
        $query = Docente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes'=>[
                'fullName'=>[
                    'asc'=>['nombre'=>SORT_ASC, 'apellido'=>SORT_ASC],
                    'desc'=>['nombre'=>SORT_DESC, 'apellido'=>SORT_DESC],
                    'label'=>'Full Name',
                    'default'=>SORT_ASC
                ],
                'numero_boleta',
                'cargo',
                'horarios',
                'turno',
                'turno_entrada_salida',
                'observacion',
                'tipo_docente',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_docente' => $this->id_docente,
            'fecha_ingreso' => $this->fecha_ingreso,
        ]);
        $query->joinWith('idPersona');

        $query->andFilterWhere(['like', 'numero_boleta', $this->numero_boleta])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'horarios', $this->horarios])
            ->andFilterWhere(['like', 'turno', $this->turno])
            ->andFilterWhere(['like', 'turno_entrada_salida', $this->turno_entrada_salida])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'tipo_docente', $this->tipo_docente])
            ->andFilterWhere(['like', 'tipo_docente', $this->tipo_docente])
            ->andFilterWhere(['like', 'persona.nombre' , $this->fullName])
            ->orFilterWhere(['like', 'persona.apellido' , $this->fullName]);

        return $dataProvider;
    }
}
