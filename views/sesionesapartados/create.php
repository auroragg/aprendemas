<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SesionesApartados */

$this->title = 'Create Sesiones Apartados';
$this->params['breadcrumbs'][] = ['label' => 'Sesiones Apartados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesiones-apartados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
