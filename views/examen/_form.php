<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Examen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sesion_apartado')->textInput() ?>

    <?= $form->field($model, 'puntuacion')->textInput() ?>

    <?= $form->field($model, 'puntuacion_minima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
