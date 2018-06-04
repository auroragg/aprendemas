<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSesiones */

$this->title = 'Update Usuarios Sesiones: ' . $model->id_usuario_sesion;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Sesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario_sesion, 'url' => ['view', 'id' => $model->id_usuario_sesion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-sesiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
