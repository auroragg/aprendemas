<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'id_sesion_apartado')->textInput() ?>

    <?= $form->field($model, 'id_pregunta')->textInput() ?>

    <?= $form->field($model, 'id_respuesta')->textInput() ?>

    <?= $form->field($model, 'correcto')->checkbox() ?>

    <?= $form->field($model, 'puntuacion_minima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
