<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preguntas".
 *
 * @property int $id_pregunta
 * @property int $id_apartado
 * @property string $pregunta
 *
 * @property Apartados $apartado
 * @property Respuestas[] $respuestas
 * @property Resultados[] $resultados
 */
class Preguntas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preguntas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apartado'], 'default', 'value' => null],
            [['id_apartado'], 'integer'],
            [['pregunta'], 'required'],
            [['pregunta'], 'string', 'max' => 255],
            [['id_apartado'], 'exist', 'skipOnError' => true, 'targetClass' => Apartados::className(), 'targetAttribute' => ['id_apartado' => 'id_apartado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta' => 'Id Pregunta',
            'id_apartado' => 'Id Apartado',
            'pregunta' => 'Pregunta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartado()
    {
        return $this->hasOne(Apartados::className(), ['id_apartado' => 'id_apartado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestas()
    {
        return $this->hasMany(Respuestas::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultados::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
