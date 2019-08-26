<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Update Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

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
