<?php

use yii\helpers\Html;
use app\models\Apartados;
use app\models\Respuestas;

/* @var $this yii\web\View */

$this->registerJsFile(
    '@web/js/test.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/progress/scripts/plugin.js"></script>
<div class="site-index">
        <?= $htmlPreg ?>

</div>
