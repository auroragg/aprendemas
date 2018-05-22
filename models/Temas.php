<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temas".
 *
 * @property int $id_tema
 * @property string $descripcion
 * @property int $id_nivel
 *
 * @property Apartados[] $apartados
 * @property Niveles $nivel
 */
class Temas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['id_nivel'], 'default', 'value' => null],
            [['id_nivel'], 'integer'],
            [['descripcion'], 'string', 'max' => 150],
            [['id_nivel'], 'exist', 'skipOnError' => true, 'targetClass' => Niveles::className(), 'targetAttribute' => ['id_nivel' => 'id_nivel']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tema' => 'Id Tema',
            'descripcion' => 'Descripcion',
            'id_nivel' => 'Id Nivel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartados()
    {
        return $this->hasMany(Apartados::className(), ['id_tema' => 'id_tema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivel()
    {
        return $this->hasOne(Niveles::className(), ['id_nivel' => 'id_nivel']);
    }
}
