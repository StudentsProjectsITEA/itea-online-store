<?php

use yii\helpers\Html;

/* @var $model frontend\models\User */
?>

<div class="section-profile-content-item active" data-target="dashboard">
    <h1 class="dashboard-title"><b>First name:</b></h1>
    <p class="dashboard-text"><?php echo Html::encode($model->first_name) ?></p>
    <h1 class="dashboard-title"><b>Last name:</b></h1>
    <p class="dashboard-text"><?php echo Html::encode($model->last_name) ?></p>
    <h1 class="dashboard-title"><b>Username:</b></h1>
    <p class="dashboard-text"><?php echo Html::encode($model->username) ?></p>
    <?php if (isset($model->mobile)): ?>
    <h1 class="dashboard-title"><b>Mobile number:</b></h1>
    <p class="dashboard-text"><?php echo '+' . Html::encode($model->mobile) ?></p>
    <?php endif; ?>
    <h1 class="dashboard-title"><b>Email address:</b></h1>
    <p class="dashboard-text"><?php echo Html::encode($model->email) ?></p>
    <h1 class="dashboard-title"><b>Created time:</b></h1>
    <p class="dashboard-text">
        <?php echo date('d.m.Y H:i:s', Html::encode($model->created_time + (3 * 60 * 60))) ?>
    </p>
    <h1 class="dashboard-title"><b>Updated time:</b></h1>
    <p class="dashboard-text">
        <?php echo date('d.m.Y H:i:s', Html::encode($model->updated_time + (3 * 60 * 60))) ?>
    </p>
</div>
