<?php

/* @var $this yii\web\View */

$this->title = 'AprendeMas';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Habla cualquier idioma</h1>

        <p class="lead">dedicando sólo diez minutos al día</p>

        <p><?php if(!$logueado) { ?>
                    <a class="btn btn-lg btn-success boton-sombra" href="http://localhost:8080/index.php?r=sesiones%2Findsesionesusuario">Empezar</a></p>
                <?php } else { ?>
                    <a class="col-xs-12 col-sm-3 col-sm-offset-2 btn btn-lg btn-success boton-sombra" href="http://localhost:8080/index.php?r=site%2Fregister">Registrate</a></p>
                    <p class="col-xs-12 col-sm-2">O</p>
                    <a class="col-xs-12 col-sm-3 btn btn-lg btn-success boton-sombra" href="http://localhost:8080/index.php?r=site%2Flogin">Inicia Sesión</a></p>
                    <p class="clearfix"></p>
                <?php }
            ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
            <?php echo $idiomas ?>
        </div>

    </div>
</div>
