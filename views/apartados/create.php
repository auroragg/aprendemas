<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Apartados */

$this->title = 'Create Apartados';
$this->params['breadcrumbs'][] = ['label' => 'Apartados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
