<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SesionesTemas;

/**
 * SesionesTemasSearch represents the model behind the search form of `app\models\SesionesTemas`.
 */
class SesionesTemasSearch extends SesionesTemas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sesion_tema', 'id_sesion', 'id_tema'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = SesionesTemas::find();

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
            'id_sesion_tema' => $this->id_sesion_tema,
            'id_sesion' => $this->id_sesion,
            'id_tema' => $this->id_tema,
            'fecha' => $this->fecha,
            'finalizado' => $this->finalizado,
        ]);

        return $dataProvider;
    }
}
