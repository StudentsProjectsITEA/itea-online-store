<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = 'Update Photo: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
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

                    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?php echo $form->field($model, 'is_main')->checkbox() ?>

                    <?php echo $form->field($model, 'product_id')->textInput() ?>

                </div>

                <div class="box-footer">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>
