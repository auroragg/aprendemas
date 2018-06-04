<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temas".
 *
 * @property int $id_tema
 * @property int $titulo
 * @property string $descripcion
 * @property int $id_idioma
 *
 * @property Apartados[] $apartados
 * @property Idiomas $idioma
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
            [['descripcion', 'titulo'], 'required'],
            [['id_idioma'], 'default', 'value' => null],
            [['id_idioma'], 'integer'],
            [['descripcion'], 'string', 'max' => 150],
            [['id_idioma'], 'exist', 'skipOnError' => true, 'targetClass' => Idiomas::className(), 'targetAttribute' => ['id_idioma' => 'id_idioma']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tema' => 'Id Tema',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'id_idioma' => 'Id Idioma',

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

    public function getSesionesTemas()
    {
        return $this->hasMany(SesionesTemas::className(), ['id_tema' => 'id_tema']);
    }

	   /**
	    * @return \yii\db\ActiveQuery
	    */
	   public function getIdioma()
	   {
	       return $this->hasOne(Idiomas::className(), ['id_idioma' => 'id_idioma']);
	   }
}
