<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */

$this->title = $model->id_jugador;
$this->params['breadcrumbs'][] = ['label' => 'Jugadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugador-view">

    <h1>ID: <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
      //      'id_jugador',
            'nombre',
            'dinero',
        ],
    ]) ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_jugador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_jugador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta usted seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
