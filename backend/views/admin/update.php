<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = 'Update Admin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'adminId' => null,
        'email' => null,
        'createdTime' => null,
        'updatedTime' => null,
    ]) ?>

</div>
