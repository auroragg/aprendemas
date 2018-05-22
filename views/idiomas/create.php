<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Idiomas */

$this->title = 'Create Idiomas';
$this->params['breadcrumbs'][] = ['label' => 'Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idiomas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
