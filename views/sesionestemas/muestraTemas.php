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
    <?php

        foreach ($temas as $tema) {
            $apartados = Apartados::findAll(['id_tema' => $tema->id_tema]);
            $clase = (SesionesTemas::findOne(['id_tema' => $tema->id_tema]) ? "temaBox" : "temaBoxInactivo");

            //$claseFinalizado = (SesionesTemas::findAll(['finalizado' => $sesionTema->finalizado]) ? "finalizado" : "noFinalizado");

            //var_dump(SesionesTemas::findOne(['id_tema' => $tema->id_tema]));
            //$claseApartado = ($sesionesTemas->finalizado) ? "glyphicon glyphicon-ok" : "glyphicon glyphicon-remove";
            ?><div class="col-md-3 <?= $clase ?>">
                <p><?= $tema->titulo ?> <span class="glyphicon glyphicon-ok"></span></p>
                <p><?= $tema->descripcion ?></p>
                <button type="button" class="btn btn-info col-xs-12" data-toggle="collapse" data-target=".demo<?= $tema->id_tema ?>">Ver Apartados</button>
                    <?php foreach ($apartados as $apartado) {
                        ?><div class= "col-xs-12 collapse demo<?= $tema->id_tema ?>">
                          <p><a href="/index.php?r=apartados%2Fview&id=<?= $apartado->id_apartado ?>"><?= $apartado->titulo ?></a></p>
                        </div>
                    <?php } ?>

            </div>

    <?php } ?>
</div>
