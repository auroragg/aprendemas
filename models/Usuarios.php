<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authkey
 * @property string $accesstoken
 * @property bool $activate
 * @property int $rol_id
 *
 * @property Sesiones[] $sesiones
 * @property Roles $rol
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'authkey', 'accesstoken'], 'required'],
            [['activate'], 'boolean'],
            [['rol_id'], 'default', 'value' => null],
            [['rol_id'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 80],
            [['password', 'authkey', 'accesstoken'], 'string', 'max' => 250],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['rol_id' => 'id_rol']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'accesstoken' => 'Accesstoken',
            'activate' => 'Activate',
            'rol_id' => 'Rol ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesiones()
    {
        return $this->hasMany(Sesiones::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Roles::className(), ['id_rol' => 'rol_id']);
    }

    /**
     * int id
     * @return username
     */
    public function getUsername() {
        return $this->username;
    }
}
