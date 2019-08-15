<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $adminId string */
/* @var $email string */
/* @var $createdTime string */
/* @var $updatedTime string */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'adminId' => $adminId,
        'email' => $email,
        'createdTime' => $createdTime,
        'updatedTime' => $updatedTime,
    ]) ?>

</div>
