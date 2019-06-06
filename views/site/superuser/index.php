<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'AECINDI';
?>
<div class="site-index">

    <div class="body-content">
        <div>
        	<h3>Bienvenido <?= Yii::$app->user->identity->email?></h3>
        	<h4>(<?php 
					$sqlwcm = 'select roles.rol from roles, user where roles.id_rol = user.id_rol and user.email = "'.Yii::$app->user->identity->email.'";';
					print Yii::$app->db->createCommand($sqlwcm)->queryScalar();/*execute();*//*queryColumn();*//*queryRow();*//*queryAll();*/
				//print $printed[0];
				?>)</h4>
        	
        </div>
    </div>
    
    <div class="jumbotron">
        <h1>AECINDI</h1>
        <img src="img/logo2.png" alt="Logo Gobernación" width="50%" />
    </div>
    
    <div class="body-content">
        <div>
        	<p>
        		<br><br>
        		- <?= Html::a('Registrar usuarios', ['site/registro'], ['class'=>'btn btn-primary']) ?>
        		<br><br>
        		- <?= Html::a('Roles', ['/roles'], ['class'=>'btn btn-primary']) ?>
        	</p>
        </div>
    </div>
    
</div>
