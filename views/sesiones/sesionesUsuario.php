<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesiones del Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesionesUsuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    //var_dump($arraySesiones); die();
        foreach ($arraySesiones as $sesion) {
            ?><div class="col-md-3"><a href="http://localhost:8080/index.php?r=temas">
                                        <img <?php if ($sesion->fin) {
                                                echo 'class="banderasApagadas"';
                                            } else {
                                                echo 'class="banderas"'; } ?> src="<?= $sesion->icono ?>" /><p></p></div>
                                    </a>
    <?php }
    ?>
</div>
