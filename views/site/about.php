<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Acerca de:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Sitio en construcción</h2>
   	<p>
   		<p>Para hacer girar la rueda:</p>
<ul>
<li>Se debe presionar sobre uno de los colores de la apuesta.</li>
<li>Despu&eacute;s de seleccionado el color el jugador debe presionar sobre la imagen. Esta ara girar la rueda.</li>
</ul>
<p style="margin-left: 18.0pt;">El algoritmo realizado calcula si el jugador acert&oacute; con el color de su elecci&oacute;n y realiza la suma correspondiente de haber acertado. Cada turno en el que se pone a girar la rueda, se realiza un descuento aleatorio que esta entre (8 y 15 % del total del dinero).</p>
   		
   	</p>
    <!--<code><?//= __FILE__ ?></code>-->
</div>
