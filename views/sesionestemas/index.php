<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesTemasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesiones Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesiones-temas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sesiones Temas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sesion_tema',
            'id_sesion',
            'id_tema',
            'fecha',
            'finalizado:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
