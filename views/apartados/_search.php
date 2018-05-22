<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApartadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_apartado') ?>

    <?= $form->field($model, 'id_tema') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'contenido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
