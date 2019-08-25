<?php

/* @var $this View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

?>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo Html::img('@web/img/user2-160x160.jpg', [
            'class' => 'user-image',
            'alt' => 'User Image',
        ]) ?>
        <span class="hidden-xs">
            <?php echo Html::encode($this->params['identityUsername']) ?>
        </span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?php echo Url::to('@web/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
            <p>
                <?php echo Html::encode($this->params['identityUsername']) ?>
                <small>
                    <?php echo 'Since ' . Html::encode(date('d.m.Y H:i:s', $this->params['createdTime'] + (3 * 60 * 60))) ?>
                </small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <?php echo Html::beginForm(['/admin/view', 'id' => $this->params['identityId']]); ?>
                <?php echo Html::submitButton('Profile', ['class' => 'btn btn-default btn-flat']) ?>
                <?php echo Html::endForm() ?>
            </div>
            <div class="pull-right">
                <?php echo Html::beginForm(['/site/logout']); ?>
                <?php echo Html::submitButton('Sign out', ['class' => 'btn btn-default btn-flat']) ?>
                <?php echo Html::endForm() ?>
            </div>
        </li>
    </ul>
</li>
