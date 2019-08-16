<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var $categoryId string */
/* @var $categoryParentId string */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $categoryId]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'depth')->textInput() ?>

    <?php echo $form->field($model, 'parent_id')->textInput(['value' => $categoryParentId]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
