<?php

use backend\models\Admin;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Admin */
/* @var $form ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="box-body">

    <?php echo $form->field($model, 'username')->textInput([
        'maxlength' => true,
        'placeholder' => 'Your username...',
    ]) ?>

    <?php echo $form->field($model, 'email')->textInput([
        'maxlength' => true,
        'placeholder' => 'Your email...',
    ]) ?>

    <?php echo $form->field($model, 'password_hash')->passwordInput([
        'maxlength' => true,
        'placeholder' => 'Your password...',
    ]) ?>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
