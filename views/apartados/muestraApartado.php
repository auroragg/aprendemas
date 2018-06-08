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
        <div class="col-md-3"><?=$htmlTemas?></div>
        <div class="col-md-9">
            <?=$htmlApartado?>
        </div>
</div>
