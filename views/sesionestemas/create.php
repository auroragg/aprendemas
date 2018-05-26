<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SesionesTemas */

$this->title = 'Create Sesiones Temas';
$this->params['breadcrumbs'][] = ['label' => 'Sesiones Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesiones-temas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
