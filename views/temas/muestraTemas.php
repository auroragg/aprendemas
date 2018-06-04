<?php

use yii\helpers\Html;
use app\models\SesionesTemas;
use app\models\Apartados;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muestraTemas-index">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $htmlStr ?>
</div>
