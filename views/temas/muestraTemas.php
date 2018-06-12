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
    <h1><?= Html::encode($this->title) ?><img id="idiomaTema" src ="<?= $icono ?>"></h1></br>
    <?= $htmlStr ?>
</div>
