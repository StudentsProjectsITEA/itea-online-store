<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $userId string */
/* @var $mobile int */
/* @var $email string */
/* @var $createdTime string */
/* @var $updatedTime string */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $userId]) ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'mobile')->textInput(['value' => $mobile]) ?>

    <?php echo $form->field($model, 'password_hash')->textInput() ?>

    <?php echo $form->field($model, 'email')->textInput(['value' => $email]) ?>

    <?php echo $form->field($model, 'status_id')->textInput() ?>

    <?php echo $form->field($model, 'created_time')->textInput(['value' => $createdTime]) ?>

    <?php echo $form->field($model, 'updated_time')->textInput(['value' => $updatedTime]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
