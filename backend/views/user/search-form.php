<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'first_name') ?>

    <?php echo $form->field($model, 'last_name') ?>

    <?php echo $form->field($model, 'mobile') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
