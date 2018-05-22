<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesApartadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesiones Apartados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesiones-apartados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sesiones Apartados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sesion_apartado',
            'id_sesion',
            'id_apartado',
            'fecha',
            'finalizado:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
