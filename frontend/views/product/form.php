<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $productId string */
/* @var $productMainPhoto string */
/* @var $createdTime int */
/* @var $updatedTime int */
/* @var $categoryId string */
/* @var $brandId string */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $productId]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'quantity')->textInput() ?>

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'main_photo')->textInput(['maxlength' => true, 'value' => $productMainPhoto]) ?>

    <?php echo $form->field($model, 'is_deleted')->checkbox() ?>

    <?php echo $form->field($model, 'created_time')->textInput(['value' => $createdTime]) ?>

    <?php echo $form->field($model, 'updated_time')->textInput(['value' => $updatedTime]) ?>

    <?php echo $form->field($model, 'category_id')->textInput(['value' => $categoryId]) ?>

    <?php echo $form->field($model, 'brand_id')->textInput(['value' => $brandId]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
