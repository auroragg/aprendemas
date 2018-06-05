<?php

use yii\helpers\Html;
use app\models\Apartados;

/* @var $this yii\web\View */

$this->title = 'Apartado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
        <?php $preguntas = $apartado->preguntas;
        foreach($preguntas as $pregunta){
            echo $pregunta->pregunta;
        }
        ?>

</div>
