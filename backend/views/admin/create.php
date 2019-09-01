<?php

use backend\models\Admin;
use yii\web\View;

/* @var $this View */
/* @var $model Admin */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'All admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">

                <?php echo $this->render('create-form', ['model' => $model]); ?>

            </div>
        </div>
    </div>
</section>
