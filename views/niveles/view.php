<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Niveles */

$this->title = $model->id_nivel;
$this->params['breadcrumbs'][] = ['label' => 'Niveles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="niveles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_nivel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_nivel], [
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
            'id_nivel',
            'descripcion',
            'id_idioma',
        ],
    ]) ?>

</div>
