<?php

use yii\helpers\Html;
use app\models\Apartados;

/* @var $this yii\web\View */

$this->title = 'Apartado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

        <?php
        //$apartado = Apartados::findOne(['id_apartado' => $id_apartado]);?>
        <div class="col-md-3">Mostrar Temas y apartados</div>
        <div class="col-md-9">
            <p>
                <?php echo $apartado->titulo;?>
            </p>
            <p>
                <?php echo $apartado->contenido;?>
            </p>
            <button type="button" class="btn btn-primary btn-block">Hacer el Test</button>
        </div>
