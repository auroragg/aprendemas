<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "idiomas".
 *
 * @property int $id_idioma
 * @property string $descripcion
 * @property string $icono
 *
 * @property Niveles[] $niveles
 * @property Sesiones[] $sesiones
 */
class Idiomas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idiomas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_idioma' => 'Id Idioma',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNiveles()
    {
        return $this->hasMany(Niveles::className(), ['id_idioma' => 'id_idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesiones()
    {
        return $this->hasMany(Sesiones::className(), ['id_idioma' => 'id_idioma']);
    }
}
