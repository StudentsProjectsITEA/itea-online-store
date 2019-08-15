<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $userId string */
/* @var $mobile int */
/* @var $email string */
/* @var $createdTime string */
/* @var $updatedTime string */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'userId' => null,
        'mobile' => null,
        'email' => null,
        'createdTime' => null,
        'updatedTime' => null,
    ]) ?>

</div>
