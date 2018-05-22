<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartados".
 *
 * @property int $id_apartado
 * @property int $id_tema
 * @property string $titulo
 * @property string $contenido
 *
 * @property Temas $tema
 * @property Preguntas[] $preguntas
 * @property SesionesApartados[] $sesionesApartados
 */
class Apartados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tema'], 'default', 'value' => null],
            [['id_tema'], 'integer'],
            [['titulo', 'contenido'], 'required'],
            [['contenido'], 'string'],
            [['titulo'], 'string', 'max' => 100],
            [['id_tema'], 'exist', 'skipOnError' => true, 'targetClass' => Temas::className(), 'targetAttribute' => ['id_tema' => 'id_tema']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_apartado' => 'Id Apartado',
            'id_tema' => 'Id Tema',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Temas::className(), ['id_tema' => 'id_tema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreguntas()
    {
        return $this->hasMany(Preguntas::className(), ['id_apartado' => 'id_apartado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesionesApartados()
    {
        return $this->hasMany(SesionesApartados::className(), ['id_apartado' => 'id_apartado']);
    }
}
