<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumno;

/**
 * AlumnoSearch represents the model behind the search form about `app\models\Alumno`.
 */
class AlumnoSearch extends Alumno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alumno'], 'integer'],
            [['fecha_ingreso', 'numero_acta', 'tipo_transporte', 'nombre_transporte', 'tel_transporte', 'fecha_vencimiento_certificado', 'fecha_inicio_certificado', 'numero_afiliado', 'id_persona', 'id_obra_social', 'id_aula'], 'safe'],
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
        $query = Alumno::find();

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
            'id_alumno' => $this->id_alumno,
            'id_persona' => $this->id_persona,
            'id_obra_social' => $this->id_obra_social,
            'id_aula' => $this->id_aula,
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_vencimiento_certificado' => $this->fecha_vencimiento_certificado,
            'fecha_inicio_certificado' => $this->fecha_inicio_certificado,
        ]);
        $query->joinWith('idPersona');
        $query->joinWith('idAula');
        $query->joinWith('idObraSocial');

        $query->andFilterWhere(['like', 'numero_acta', $this->numero_acta])
            ->andFilterWhere(['like', 'tipo_transporte', $this->tipo_transporte])
            ->andFilterWhere(['like', 'nombre_transporte', $this->nombre_transporte])
            ->andFilterWhere(['like', 'tel_transporte', $this->tel_transporte])
            ->andFilterWhere(['like', 'numero_afiliado', $this->numero_afiliado])
            ->andFilterWhere(['like', 'persona.nombre', $this->id_persona])
            ->andFilterWhere(['like', 'persona.documento', $this->id_persona]);

        return $dataProvider;
    }
}
