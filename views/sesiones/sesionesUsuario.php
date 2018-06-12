<?php

use yii\helpers\Html;
use app\models\SesionesTemas;
use app\models\SesionesApartados;
use app\models\Apartados;
use app\models\Temas;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SesionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursos del Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesionesUsuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    //var_dump($arraySesiones); die();
        foreach ($arraySesiones as $sesion) {
            //$sesionesTemas = SesionesTemas::findAll(['id_sesion' => $sesion->id_sesion]);
            //$idioma = $sesion->sesion->id_idioma;
            //var_dump($idioma); die();
            $temas = Temas::findAll(['id_idioma' => $sesion->id_idioma]);
            ?><div class="col-md-3"><a href="/index.php?r=temas/muestratemas&id_sesion=<?php echo $sesion->id_sesion?>">
                                        <img <?php if ($sesion->fin) {
                                                echo 'class="banderasApagadasBg"';
                                            } else {
                                                echo 'class="banderasBg"'; } ?> src="<?= $sesion->icono ?>" /></a>
                                        <div>
                                            <br>
                                            <p <?php if ($sesion->fin) {?> >
                                                    <?php echo $sesion->descripcionIdioma ?><br>
                                                    ¡¡FINALIZADO!!
                                                <?php } else { ?> >
                                                        <?php echo $sesion->descripcionIdioma ?><br>
                                                        Tiene: <?php echo count($temas); ?> temas <br>
                                                        ¡¡NO TERMINADO!!
                                                        <?php
                                                            // $apartadoUltimo = SesionesApartados::find()
                                                            //                    ->where(['id_sesion' => $sesion->id_sesion])
                                                            //                    ->orderBy(['id_apartado'=>SORT_DESC])
                                                            //                    ->one();
                                                            // $temaActual = Apartados::findOne(['id_apartado' => $apartadoUltimo->id_apartado])->id_tema;
                                                            // echo ($temaActual);
                                                        ?>

                                                    <?php } ?>
                                            </p>
                                        </div>
                </div>

    <?php }
    ?>
</div>
