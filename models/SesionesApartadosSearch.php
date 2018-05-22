<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SesionesApartados;

/**
 * SesionesApartadosSearch represents the model behind the search form of `app\models\SesionesApartados`.
 */
class SesionesApartadosSearch extends SesionesApartados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sesion_apartado', 'id_sesion', 'id_apartado'], 'integer'],
            [['fecha',], 'safe'],
            [['finalizado'], 'boolean'],
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
        $query = SesionesApartados::find();

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
            'id_sesion_apartado' => $this->id_sesion_apartado,
            'id_sesion' => $this->id_sesion,
            'id_apartado' => $this->id_apartado,
            'fecha' => $this->fecha,
            'finalizado' => $this->finalizado,
        ]);

        return $dataProvider;
    }
}
