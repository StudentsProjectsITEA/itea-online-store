<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
/* @var $orderId string */
/* @var $statusId int */
/* @var $paymentId int */
/* @var $shippingId int */
/* @var $createdTime string */
/* @var $updatedTime string */
/* @var $userId string */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['value' => $orderId]) ?>

    <?php echo $form->field($model, 'status_id')->textInput(['value' => $statusId]) ?>

    <?php echo $form->field($model, 'payment_id')->textInput(['value' => $paymentId]) ?>

    <?php echo $form->field($model, 'shipping_id')->textInput(['value' => $shippingId]) ?>

    <?php echo $form->field($model, 'shipping_address')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'created_time')->textInput(['value' => $createdTime]) ?>

    <?php echo $form->field($model, 'updated_time')->textInput(['value' => $updatedTime]) ?>

    <?php echo $form->field($model, 'user_id')->textInput(['value' => $userId]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
