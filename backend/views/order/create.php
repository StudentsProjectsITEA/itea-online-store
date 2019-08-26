<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $orderId string */
/* @var $statusId int */
/* @var $paymentId int */
/* @var $shippingId int */
/* @var $createdTime string */
/* @var $updatedTime string */
/* @var $userId string */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'All orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'payment_id')->textInput() ?>

    <?php echo $form->field($model, 'shipping_id')->textInput() ?>

    <?php echo $form->field($model, 'shipping_address')->textInput() ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
