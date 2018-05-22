<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Idiomas */

$this->title = 'Update Idiomas: ' . $model->id_idioma;
$this->params['breadcrumbs'][] = ['label' => 'Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_idioma, 'url' => ['view', 'id' => $model->id_idioma]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="idiomas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
