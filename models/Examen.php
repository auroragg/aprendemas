<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examen".
 *
 * @property int $id_examen
 * @property int $id_sesion_apartado
 * @property int $puntuacion
 * @property int $puntuacion_minima
 *
 * @property SesionesApartados $sesionApartado
 */
class Examen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sesion_apartado', 'puntuacion', 'puntuacion_minima'], 'default', 'value' => null],
            [['id_sesion_apartado', 'puntuacion', 'puntuacion_minima'], 'integer'],
            [['puntuacion', 'puntuacion_minima'], 'required'],
            [['id_sesion_apartado'], 'exist', 'skipOnError' => true, 'targetClass' => SesionesApartados::className(), 'targetAttribute' => ['id_sesion_apartado' => 'id_sesion_apartado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_examen' => 'Id Examen',
            'id_sesion_apartado' => 'Id Sesion Apartado',
            'puntuacion' => 'Puntuacion',
            'puntuacion_minima' => 'Puntuacion Minima',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesionApartado()
    {
        return $this->hasOne(SesionesApartados::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
    }
}
