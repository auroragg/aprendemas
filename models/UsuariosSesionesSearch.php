<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuariosSesiones;

/**
 * UsuariosSesionesSearch represents the model behind the search form of `app\models\UsuariosSesiones`.
 */
class UsuariosSesionesSearch extends UsuariosSesiones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario_sesion', 'id_usuario', 'id_sesion'], 'integer'],
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
        $query = UsuariosSesiones::find();

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
            'id_usuario_sesion' => $this->id_usuario_sesion,
            'id_usuario' => $this->id_usuario,
            'id_sesion' => $this->id_sesion,
        ]);

        return $dataProvider;
    }
}
