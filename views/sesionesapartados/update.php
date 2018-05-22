<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SesionesApartados */

$this->title = 'Update Sesiones Apartados: ' . $model->id_sesion_apartado;
$this->params['breadcrumbs'][] = ['label' => 'Sesiones Apartados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sesion_apartado, 'url' => ['view', 'id' => $model->id_sesion_apartado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesiones-apartados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
