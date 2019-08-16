<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */
/* @var $form yii\widgets\ActiveForm */
/* @var $photoId string */
/* @var $photoName string */
/* @var $createdTime int */
/* @var $productId string */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $photoId]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true, 'value' => $photoName]) ?>

    <?php echo $form->field($model, 'is_main')->checkbox() ?>

    <?php echo $form->field($model, 'created_time')->textInput(['value' => $createdTime]) ?>

    <?php echo $form->field($model, 'product_id')->textInput(['value' => $productId]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
