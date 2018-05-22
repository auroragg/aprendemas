<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartados */

$this->title = 'Update Apartados: ' . $model->id_apartado;
$this->params['breadcrumbs'][] = ['label' => 'Apartados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_apartado, 'url' => ['view', 'id' => $model->id_apartado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
