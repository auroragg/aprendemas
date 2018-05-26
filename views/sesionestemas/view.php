<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SesionesTemas */

$this->title = $model->id_sesion_tema;
$this->params['breadcrumbs'][] = ['label' => 'Sesiones Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesiones-temas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sesion_tema], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sesion_tema], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sesion_tema',
            'id_sesion',
            'id_tema',
            'fecha',
            'finalizado:boolean',
        ],
    ]) ?>

</div>
