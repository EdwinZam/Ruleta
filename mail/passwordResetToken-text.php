<?php

/* @var $this yii\web\View */
/* @var $user apps\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hola <?= $user->email ?>,

Siga el siguiente enlace para restablecer su contraseña:

<?= $resetLink ?>
