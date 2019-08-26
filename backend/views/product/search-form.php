<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'description') ?>

    <?php echo $form->field($model, 'price') ?>

    <?php echo $form->field($model, 'main_photo') ?>

    <?php echo $form->field($model, 'is_deleted')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
