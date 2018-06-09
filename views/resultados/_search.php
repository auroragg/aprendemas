<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResultadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_resultado') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'id_sesion_apartado') ?>

    <?= $form->field($model, 'id_pregunta') ?>

    <?= $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'correcto')->checkbox() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
