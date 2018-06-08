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
<div class="site-index">
        <?= $htmlPreg ?>

</div>
