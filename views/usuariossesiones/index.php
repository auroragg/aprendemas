<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Sesiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-sesiones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarios Sesiones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_usuario_sesion',
            'id_usuario',
            'id_sesion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
