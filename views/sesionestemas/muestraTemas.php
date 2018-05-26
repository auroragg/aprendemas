<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muestraTemas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    //var_dump($temas); die(); ¿Porqué sólo me da un tema? si el idioma tiene mas temas creados
        foreach ($temas as $tema) {
            ?><div class="col-md-3 tema">
                <p>
                    <?= $tema->titulo ?>
                </p>
                <p>
                    <?= $tema->descripcionTema ?>
                </p>
            </div>

    <?php } ?>
</div>
