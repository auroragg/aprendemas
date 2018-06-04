<?php

/* @var $this yii\web\View */

$this->title = 'AprendeMas';
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<div class="site-index">

    <div class="jumbotron">
        <h1>Habla cualquier idioma</h1>

        <p class="lead">dedicando sólo diez minutos al día</p>

        <?php if(!$logueado) {
                    if ($haySesiones != null) {?>
                        <p>
                            <a class="btn btn-lg btn-success boton-sombra" href="index.php?r=sesiones/indsesionesusuario">Empezar</a>
                        </p>
                        <p class="btn btn-lg btn-success boton-sombra">Escoge uno de los idiomas de abajo para comenzar un curso.</p>
                    <?php } else {?>
                        <p class="btn btn-lg btn-success boton-sombra">Escoge uno de los idiomas de abajo para comenzar un curso.</p>
                    <?php }
                 } else { ?>
                    <p><a class="col-xs-12 col-sm-3 col-sm-offset-2 btn btn-lg btn-success boton-sombra" href="index.php?r=site%2Fregister">Registrate</a></p>
                    <p class="col-xs-12 col-sm-2">O</p>
                    <p>
                        <a class="col-xs-12 col-sm-3 btn btn-lg btn-success boton-sombra" href="index.php?r=site%2Flogin">Inicia Sesión</a></p>
                    <p class="clearfix"></p>
                <?php }
            ?>
    </div>

        <?php echo $banderas ?>
</div>
