<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Temas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tema',
            'descripcion',
            'id_idioma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
