<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Respuestas */

$this->title = 'Update Respuestas: ' . $model->id_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_respuesta, 'url' => ['view', 'id' => $model->id_respuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="respuestas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
