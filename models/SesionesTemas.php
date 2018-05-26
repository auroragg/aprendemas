<?php

namespace app\models;

/**
 * This is the model class for table "sesiones_temas".
 *
 * @property int $id_sesion_tema
 * @property int $id_sesion
 * @property int $id_tema
 * @property string $fecha
 * @property bool $finalizado
 *
 * @property SesionesApartados[] $sesionesApartados
 * @property Sesiones $sesion
 * @property Temas $tema
 */
class SesionesTemas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesiones_temas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sesion', 'id_tema'], 'default', 'value' => null],
            [['id_sesion', 'id_tema'], 'integer'],
            [['fecha'], 'safe'],
            [['finalizado'], 'boolean'],
            [['id_sesion'], 'exist', 'skipOnError' => true, 'targetClass' => Sesiones::className(), 'targetAttribute' => ['id_sesion' => 'id_sesion']],
            [['id_tema'], 'exist', 'skipOnError' => true, 'targetClass' => Temas::className(), 'targetAttribute' => ['id_tema' => 'id_tema']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sesion_tema' => 'Id Sesion Tema',
            'id_sesion' => 'Id Sesion',
            'id_tema' => 'Id Tema',
            'fecha' => 'Fecha',
            'finalizado' => 'Finalizado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescripciontema()
    {
        return $this->tema->descripcion;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo()
    {
        return $this->tema->titulo;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesionesApartados()
    {
        return $this->hasMany(SesionesApartados::className(), ['id_sesion_tema' => 'id_sesion_tema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesion()
    {
        return $this->hasOne(Sesiones::className(), ['id_sesion' => 'id_sesion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Temas::className(), ['id_tema' => 'id_tema']);
    }
}
