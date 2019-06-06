<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */

$this->title = 'Actalizar Jugador: ' . $model->id_jugador;
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jugador, 'url' => ['view', 'id' => $model->id_jugador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jugador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
