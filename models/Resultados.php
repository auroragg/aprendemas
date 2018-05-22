<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resultados".
 *
 * @property int $id_resultado
 * @property string $fecha
 * @property int $id_sesion_apartado
 * @property int $id_pregunta
 * @property int $id_respuesta
 * @property bool $correcto
 * @property int $puntuacion_minima
 *
 * @property Preguntas $pregunta
 * @property Respuestas $respuesta
 * @property SesionesApartados $sesionApartado
 */
class Resultados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'correcto', 'puntuacion_minima'], 'required'],
            [['fecha'], 'safe'],
            [['id_sesion_apartado', 'id_pregunta', 'id_respuesta', 'puntuacion_minima'], 'default', 'value' => null],
            [['id_sesion_apartado', 'id_pregunta', 'id_respuesta', 'puntuacion_minima'], 'integer'],
            [['correcto'], 'boolean'],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Preguntas::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Respuestas::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            [['id_sesion_apartado'], 'exist', 'skipOnError' => true, 'targetClass' => SesionesApartados::className(), 'targetAttribute' => ['id_sesion_apartado' => 'id_sesion_apartado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resultado' => 'Id Resultado',
            'fecha' => 'Fecha',
            'id_sesion_apartado' => 'Id Sesion Apartado',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'correcto' => 'Correcto',
            'puntuacion_minima' => 'Puntuacion Minima',
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
    public function getRespuesta()
    {
        return $this->hasOne(Respuestas::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesionApartado()
    {
        return $this->hasOne(SesionesApartados::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
    }
}
