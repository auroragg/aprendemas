<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuestas".
 *
 * @property int $id_respuesta
 * @property int $id_pregunta
 * @property string $descripcion
 *
 * @property Preguntas $pregunta
 * @property Resultados[] $resultados
 */
class Respuestas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuestas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pregunta'], 'default', 'value' => null],
            [['id_pregunta'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Preguntas::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_respuesta' => 'Id Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPregunta()
    {
        return $this->hasOne(Preguntas::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultados::className(), ['id_respuesta' => 'id_respuesta']);
    }
}
