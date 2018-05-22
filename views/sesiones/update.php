<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sesiones */

$this->title = 'Update Sesiones: ' . $model->id_sesion;
$this->params['breadcrumbs'][] = ['label' => 'Sesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sesion, 'url' => ['view', 'id' => $model->id_sesion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
