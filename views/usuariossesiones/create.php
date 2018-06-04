<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSesiones */

$this->title = 'Create Usuarios Sesiones';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Sesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-sesiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
