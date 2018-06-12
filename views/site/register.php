<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
?>

<h3><?= $msg ?></h3>

<h1>Register</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group" name="contenedor1">
 <?= $form->field($model, "username")->input("text", ['id'=>"nombre"]) ?>
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>
</div>

<?= Html::submitButton("Register", ["class" => "btn btn-primary reg"]) ?>

<?php $form->end() ?>
