<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Temas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temas-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_idioma')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
