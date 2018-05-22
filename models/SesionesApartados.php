<?php

namespace app\models;

use Yii;

/**
* This is the model class for table "sesiones_apartados".
*
* @property int $id_sesion_apartado
* @property int $id_sesion
* @property int $id_apartado
* @property string $fecha
* @property bool $finalizado
*
* @property Examen[] $examens
* @property Resultados[] $resultados
* @property Apartados $apartado
* @property Sesiones $sesion
*/
class SesionesApartados extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
       return 'sesiones_apartados';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
       return [
           [['id_sesion', 'id_apartado'], 'default', 'value' => null],
           [['id_sesion', 'id_apartado'], 'integer'],
           [['fecha', 'finalizado'], 'required'],
           [['fecha'], 'safe'],
           [['finalizado'], 'boolean'],
           [['id_apartado'], 'exist', 'skipOnError' => true, 'targetClass' => Apartados::className(), 'targetAttribute' => ['id_apartado' => 'id_apartado']],
           [['id_sesion'], 'exist', 'skipOnError' => true, 'targetClass' => Sesiones::className(), 'targetAttribute' => ['id_sesion' => 'id_sesion']],
       ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
       return [
           'id_sesion_apartado' => 'Id Sesion Apartado',
           'id_sesion' => 'Id Sesion',
           'id_apartado' => 'Id Apartado',
           'fecha' => 'Fecha',
           'finalizado' => 'Finalizado',
       ];
   }

   /**
    * @return \yii\db\ActiveQuery
    */
   public function getExamens()
   {
       return $this->hasMany(Examen::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
   }

   /**
    * @return \yii\db\ActiveQuery
    */
   public function getResultados()
   {
       return $this->hasMany(Resultados::className(), ['id_sesion_apartado' => 'id_sesion_apartado']);
   }

   /**
    * @return \yii\db\ActiveQuery
    */
   public function getApartado()
   {
       return $this->hasOne(Apartados::className(), ['id_apartado' => 'id_apartado']);
   }

   /**
    * @return \yii\db\ActiveQuery
    */
   public function getSesion()
   {
       return $this->hasOne(Sesiones::className(), ['id_sesion' => 'id_sesion']);
   }
}
