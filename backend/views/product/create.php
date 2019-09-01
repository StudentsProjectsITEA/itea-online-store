<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

                    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?php echo $form->field($model, 'quantity')->textInput() ?>

                    <?php echo $form->field($model, 'price')->textInput() ?>

                    <?php echo $form->field($model, 'main_photo')->textInput(['maxlength' => true]) ?>

                    <?php echo $form->field($model, 'category_id')->textInput() ?>

                    <?php echo $form->field($model, 'brand_id')->textInput() ?>

                </div>

                <div class="box-footer">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>
