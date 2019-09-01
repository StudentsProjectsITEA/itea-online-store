<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Update Order from ' . $model->user->first_name . ' ' . $model->user->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->

                <?php $form = ActiveForm::begin(); ?>

                <div class="box-body">

                    <?php echo $form->field($model, 'payment_id')->textInput() ?>

                    <?php echo $form->field($model, 'shipping_id')->textInput() ?>

                    <?php echo $form->field($model, 'shipping_address')->textInput() ?>

                    <?php echo $form->field($model, 'user_id')->textInput() ?>

                </div>

                <div class="box-footer">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>
