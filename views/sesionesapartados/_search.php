<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SesionesApartadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesiones-apartados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sesion_apartado') ?>

    <?= $form->field($model, 'id_sesion') ?>

    <?= $form->field($model, 'id_apartado') ?>

    <?= $form->field($model, 'fecha') ?>
    
    <?= $form->field($model, 'finalizado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
