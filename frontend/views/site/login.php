<?php

use frontend\models\SignupForm;
use frontend\models\LoginForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $registrationModel SignupForm */
/* @var $loginModel LoginForm */

$this->title = 'Login';
?>
<div class="container">
    <div class="login-form">

        <?php echo $this->render('modal-login', [
            'model' => $loginModel,
        ]) ?>

    </div>
    <div class="registration-form">

        <?php echo $this->render('modal-registration', [
            'model' => $registrationModel,
        ]) ?>

    </div>
</div>