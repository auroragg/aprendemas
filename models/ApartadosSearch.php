<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Apartados;

/**
 * ApartadosSearch represents the model behind the search form of `app\models\Apartados`.
 */
class ApartadosSearch extends Apartados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apartado', 'id_tema'], 'integer'],
            [['titulo', 'contenido'], 'safe'],
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
        $query = Apartados::find();

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
            'id_apartado' => $this->id_apartado,
            'id_tema' => $this->id_tema,
        ]);

        $query->andFilterWhere(['ilike', 'titulo', $this->titulo])
            ->andFilterWhere(['ilike', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}
