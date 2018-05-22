<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IdiomasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Idiomas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idiomas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Idiomas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_idioma',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
