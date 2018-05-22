<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "niveles".
 *
 * @property int $id_nivel
 * @property string $descripcion
 * @property int $id_idioma
 *
 * @property Idiomas $idioma
 * @property Temas[] $temas
 */
class Niveles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'niveles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_idioma'], 'default', 'value' => null],
            [['id_idioma'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['id_idioma'], 'exist', 'skipOnError' => true, 'targetClass' => Idiomas::className(), 'targetAttribute' => ['id_idioma' => 'id_idioma']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nivel' => 'Id Nivel',
            'descripcion' => 'Descripcion',
            'id_idioma' => 'Id Idioma',
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
    public function getTemas()
    {
        return $this->hasMany(Temas::className(), ['id_nivel' => 'id_nivel']);
    }
}
