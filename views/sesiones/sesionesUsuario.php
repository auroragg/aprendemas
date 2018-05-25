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
            ?><div class="col-md-3"><a href="index.php?TemasSearch%5Bid_tema%5D=&TemasSearch%5Bdescripcion%5D=&TemasSearch%5Bid_idioma%5D=<?php echo $sesion->id_idioma?>&r=temas">
                                        <img <?php if ($sesion->fin) {
                                                echo 'class="banderasApagadasBg"';
                                            } else {
                                                echo 'class="banderasBg"'; } ?> src="<?= $sesion->icono ?>" /></a>
                                        <div>
                                            <br>
                                            <p <?php if ($sesion->fin) {?> >
                                                    Del idioma:  <?php echo $sesion->descripcionIdioma ?><br>
                                                    ¡¡FINALIZADO!!
                                                <?php } else { ?> >
                                                Del idioma:  <?php echo $sesion->descripcionIdioma ?><br>
                                                Faltan: x temas por terminar
                                            <?php } ?>
                                            </p>
                                        </div>
                </div>

    <?php }
    ?>
</div>
