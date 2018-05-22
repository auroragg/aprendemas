<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Preguntas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="preguntas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_apartado')->textInput() ?>

    <?= $form->field($model, 'pregunta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
