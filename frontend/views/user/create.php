<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $userId string */
/* @var $mobile int */
/* @var $email string */
/* @var $createdTime string */
/* @var $updatedTime string */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('settings-form', [
        'model' => $model,
    ]) ?>

</div>
