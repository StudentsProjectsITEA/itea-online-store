<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\PhotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'is_main')->checkbox() ?>

    <?php echo $form->field($model, 'product_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
