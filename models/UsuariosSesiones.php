<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_sesiones".
 *
 * @property int $id_usuario_sesion
 * @property int $id_usuario
 * @property int $id_sesion
 *
 * @property Sesiones $sesion
 * @property Usuarios $usuario
 */
class UsuariosSesiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_sesiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_sesion'], 'required'],
            [['id_usuario', 'id_sesion'], 'default', 'value' => null],
            [['id_usuario', 'id_sesion'], 'integer'],
            [['id_sesion'], 'exist', 'skipOnError' => true, 'targetClass' => Sesiones::className(), 'targetAttribute' => ['id_sesion' => 'id_sesion']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario_sesion' => 'Id Usuario Sesion',
            'id_usuario' => 'Id Usuario',
            'id_sesion' => 'Id Sesion',
        ];
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
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'id_usuario']);
    }
}
