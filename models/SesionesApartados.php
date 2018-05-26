<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sesiones_apartados".
 *
 * @property int $id_sesion_apartado
 * @property int $id_sesion_tema
 * @property int $id_apartado
 * @property string $fecha
 * @property bool $finalizado
 *
 * @property Examen[] $examens
 * @property Resultados[] $resultados
 * @property Apartados $apartado
 * @property SesionesTemas $sesionTema
 */
class SesionesApartados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesiones_apartados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sesion_tema', 'id_apartado'], 'default', 'value' => null],
            [['id_sesion_tema', 'id_apartado'], 'integer'],
            [['fecha'], 'safe'],
            [['finalizado'], 'boolean'],
            [['id_apartado'], 'exist', 'skipOnError' => true, 'targetClass' => Apartados::className(), 'targetAttribute' => ['id_apartado' => 'id_apartado']],
            [['id_sesion_tema'], 'exist', 'skipOnError' => true, 'targetClass' => SesionesTemas::className(), 'targetAttribute' => ['id_sesion_tema' => 'id_sesion_tema']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sesion_apartado' => 'Id Sesion Apartado',
            'id_sesion_tema' => 'Id Sesion Tema',
            'id_apartado' => 'Id Apartado',
            'fecha' => 'Fecha',
            'finalizado' => 'Finalizado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamens()
    {
        return $this->hasMany(Examen::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultados::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
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
    public function getSesionTema()
    {
        return $this->hasOne(SesionesTemas::className(), ['id_sesion_tema' => 'id_sesion_tema']);
    }
}
