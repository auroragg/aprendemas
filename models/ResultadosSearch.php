<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resultados;

/**
 * ResultadosSearch represents the model behind the search form of `app\models\Resultados`.
 */
class ResultadosSearch extends Resultados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resultado', 'id_sesion_apartado', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['fecha'], 'safe'],
            [['correcto'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Resultados::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_resultado' => $this->id_resultado,
            'fecha' => $this->fecha,
            'id_sesion_apartado' => $this->id_sesion_apartado,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'correcto' => $this->correcto,
        ]);

        return $dataProvider;
    }
}
