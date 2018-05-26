<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SesionesTemas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesiones-temas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sesion')->textInput() ?>

    <?= $form->field($model, 'id_tema')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'finalizado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
