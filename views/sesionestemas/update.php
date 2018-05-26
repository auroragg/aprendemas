<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SesionesTemas */

$this->title = 'Update Sesiones Temas: ' . $model->id_sesion_tema;
$this->params['breadcrumbs'][] = ['label' => 'Sesiones Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sesion_tema, 'url' => ['view', 'id' => $model->id_sesion_tema]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesiones-temas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
