<?php

use yii\helpers\Html;
use app\models\Apartados;

/* @var $this yii\web\View */
$this->registerJsFile(
    '@web/js/test.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->title = 'Apartado';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/progress/scripts/plugin.js"></script>
<div class="site-index">

        <?php
        //$apartado = Apartados::findOne(['id_apartado' => $id_apartado]);?>
        <aside class="col-md-3 temas-lateral"><?=$htmlTemas?></aside>
        <article class="col-md-9">
            <?=$htmlApartado?>
        </article>
</div>
