<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Standard;
//New
/*use yii\helpers\ArrayHelper;
use app\models\SignupForm;
use yii\bootstrap\ActiveField;*/
//Fin new

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, rellene los siguientes campos para registrarse:</p>

    <div class="row">
        <div class="col-lg-5">
           <!--Antes id = form-signup-->
            <?php $form = ActiveForm::begin(['id' => 'form-registro']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                
                <?php
				$roles=Standard::find()->all();
				$rolesList=ArrayHelper::map($roles,'id_rol','rol');
				echo $form->field($model, 'rol')->dropDownList($rolesList,['prompt'=>'Por favor seleccione un rol']);
				?>
               
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-primary']) ?>
                    
                <div>
                    <?php if ($msgreg !== null){?>	
                  	<h3 style="color: red"><?php print $msgreg;?></h3>
                   	<?php }?>
				</div>
                    <!--?= Html::a( 'Restroceder', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>-->
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
