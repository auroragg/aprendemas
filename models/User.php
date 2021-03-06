<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{

    public $id;
    public $username;
    public $email;
    public $password;
    public $authkey;
    public $accesstoken;
    public $activate;
    public $rol_id;

    /**
     * @inheritdoc
     * @return boolean
     */

    /* comprueba si el usuario tiene rol adminitrador */

    public static function isAdmin($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => true, 'rol_id' => 1])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     * @return boolean
     */

    /* comprueba si el usuario tiene rol adminitrador */

    public static function isUser($id)
    {
        if (Users::findOne(['id' => $id, 'activate' => true, 'rol_id' => 2])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */

    /* busca la identidad del usuario a través de su $id */

    public static function findIdentity($id)
    {

        $user = Usuarios::find()
                ->where('activate=:activate', [':activate' => 1])
                ->andWhere('id=:id', ['id' => $id])
                ->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */

    /* Busca la identidad del usuario a través de su token de acceso */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        $usuarios = Usuarios::find()
                ->where('activate=:activate', [':activate' => 1])
                ->andWhere('accesstoken=:accesstoken', [':accesstoken' => $token])
                ->all();

        foreach ($usuarios as $user) {
            if ($user->accesstoken === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */

    /* Busca la identidad del usuario a través del username */
    public static function findByUsername($username)
    {
        $usuarios = Usuarios::find()
                ->where('activate=:activate', ['activate' => 1])
                ->andWhere('username=:username', [':username' => $username])
                ->all();

        foreach ($usuarios as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */

    /* Regresa el id del usuario */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */

    /* Regresa la clave de autenticación */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * @inheritdoc
     */

    /* Valida la clave de autenticación */
    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //var_dump($password);
        //var_dump($this->password); die();
        /* Valida el password */
        if (crypt($password, $this->password) == $this->password)
        {
        return $password === $password;
        }
    }
}
