<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
/* @var $adminId string */
/* @var $email string */
/* @var $createdTime string */
/* @var $updatedTime string */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $adminId]) ?>

    <?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $email]) ?>

    <?php echo $form->field($model, 'status_id')->textInput() ?>

    <?php echo $form->field($model, 'created_time')->textInput(['value' => $createdTime]) ?>

    <?php echo $form->field($model, 'updated_time')->textInput(['value' => $updatedTime]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
