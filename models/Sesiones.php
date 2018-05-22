<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sesiones".
 *
 * @property int $id_sesion
 * @property int $id_usuario
 * @property int $id_idioma
 * @property string $fecha
 * @property bool $fin
 *
 * @property Idiomas $idioma
 * @property Usuarios $usuario
 * @property SesionesApartados[] $sesionesApartados
 */
class Sesiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_idioma', 'fecha'], 'required'],
            [['id_usuario', 'id_idioma'], 'default', 'value' => null],
            [['id_usuario', 'id_idioma'], 'integer'],
            [['fecha'], 'safe'],
            [['fin'], 'boolean'],
            [['id_idioma'], 'exist', 'skipOnError' => true, 'targetClass' => Idiomas::className(), 'targetAttribute' => ['id_idioma' => 'id_idioma']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sesion' => 'Id Sesion',
            'id_usuario' => 'Id Usuario',
            'id_idioma' => 'Id Idioma',
            'fecha' => 'Fecha',
            'fin' => 'Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdioma()
    {
        return $this->hasOne(Idiomas::className(), ['id_idioma' => 'id_idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescripcionIdioma()
    {
        return $this->idioma->descripcion;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcono()
    {
        return $this->idioma->icono;
        }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername()
    {
        return $this->usuario->username;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesionesApartados()
    {
        return $this->hasMany(SesionesApartados::className(), ['id_sesion' => 'id_sesion']);
    }
}
