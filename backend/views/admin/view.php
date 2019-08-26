<?php

use backend\models\Admin;
use backend\models\SettingsForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Admin */
/* @var $settingsForm SettingsForm */

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="<?php echo Url::to('@web/img/user2-160x160.jpg'); ?>"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">
                        <?php echo Html::encode($model->username) ?>
                    </h3>

                    <p class="text-muted text-center">
                        <?php echo Html::encode($model->email) ?>
                    </p>
<!--                    <a href="#settings" data-toggle="tab">Settings</a>-->
                    <?php echo Html::a('<b>Update</b>', '#settings', [
                        'class' => 'btn btn-primary btn-block',
                        'data-toggle' => 'tab',
                    ]) ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?php echo Html::encode('About Me') ?>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong>
                        <i class="fa fa-book margin-r-5"></i>
                        <?php echo Html::encode('Activity') ?>
                    </strong>

                    <p class="text-muted">
                        <?php echo 'Account created at: ' . '<br>' . Html::encode(date('d.m.Y H:i:s', $model->created_time)) ?>
                    </p>

                    <hr>

                    <strong>
                        <i class="fa fa-map-marker margin-r-5"></i>
                        <?php echo Html::encode('Location') ?>
                    </strong>

                    <p class="text-muted">
                        <?php echo Html::encode('Kyiv, Ukraine') ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                     src="<?php echo Url::to('@web/img/user2-160x160.jpg'); ?>"
                                     alt="user image">
                                <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">Shared publicly - 7:30 PM today</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore the hate as they create awesome
                                tools to help create filler text for everyone from bacon lovers
                                to Charlie Sheen fans.
                            </p>
                            <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i>
                                        Share</a></li>
                                <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a></li>
                            </ul>

                            <input class="form-control input-sm" type="text" placeholder="Type a comment">
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                     src="<?php echo Url::to('@web/img/user3-128x128.jpg'); ?>"
                                     alt="User Image">
                                <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">Sent you a message - 3 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore the hate as they create awesome
                                tools to help create filler text for everyone from bacon lovers
                                to Charlie Sheen fans.
                            </p>

                            <form class="form-horizontal">
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm" placeholder="Response">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm"
                                     src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>"
                                     alt="User Image">
                                <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">Posted 5 photos - 5 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="row margin-bottom">
                                <div class="col-sm-6">
                                    <img class="img-responsive"
                                         src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>" alt="Photo">
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img class="img-responsive"
                                                 src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>" alt="Photo">
                                            <br>
                                            <img class="img-responsive"
                                                 src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <img class="img-responsive"
                                                 src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>" alt="Photo">
                                            <br>
                                            <img class="img-responsive"
                                                 src="<?php echo Url::to('@web/img/user4-128x128.jpg'); ?>" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i>
                                        Share</a></li>
                                <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                        (5)</a></li>
                            </ul>

                            <input class="form-control input-sm" type="text" placeholder="Type a comment">
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                    <div class="timeline-body">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                        quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-xs">Read more</a>
                                        <a class="btn btn-danger btn-xs">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-user bg-aqua"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your
                                        friend request
                                    </h3>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-comments bg-yellow"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                    </h3>

                                    <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-camera bg-purple"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">

                        <?php $form = ActiveForm::begin([
                            'action' => ['update', 'id' => $model->id],
                            'options' => [
                                'class' => 'form-horizontal',
                            ],

                        ]); ?>

                        <?php echo $form
                            ->field($settingsForm, 'username', [
                                'template' => "{label}" . '<div class="col-sm-10">' . "\n{input}\n" . '</div>' . "{hint}\n" . '<div class="col-sm-2"></div><div class="col-sm-8">' . "{error}" . '</div>',
                            ])
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Your username...',
                                'value' => $model->username,
                            ])->label('Username', [
                                'class' => 'col-sm-2 control-label',
                            ]) ?>

                        <?php echo $form
                            ->field($settingsForm, 'email', [
                                'template' => "{label}" . '<div class="col-sm-10">' . "\n{input}\n" . '</div>' . "{hint}\n" . '<div class="col-sm-2"></div><div class="col-sm-8">' . "{error}" . '</div>',
                            ])
                            ->input('email', [
                                'class' => 'form-control',
                                'placeholder' => 'Your email...',
                                'value' => $model->email,
                            ])->label('Email', [
                                'class' => 'col-sm-2 control-label',
                            ]) ?>

                        <?php echo $form
                            ->field($settingsForm, 'new_password', [
                                'template' => "{label}" . '<div class="col-sm-10">' . "\n{input}\n" . '</div>' . "{hint}\n" . '<div class="col-sm-8">' . "{error}" . '</div>',
                            ])
                            ->passwordInput([
                                'class' => 'form-control',
                                'placeholder' => 'Your new password...',
                            ])->label('New password', [
                                'class' => 'col-sm-2 control-label',
                            ]) ?>

                        <?php echo $form
                            ->field($settingsForm, 'confirm_new_password', [
                                'template' => "{label}" . '<div class="col-sm-10">' . "\n{input}\n" . '</div>' . "{hint}\n" . '<div class="col-sm-8">' . "{error}" . '</div>',
                            ])
                            ->passwordInput([
                                'class' => 'form-control',
                                'placeholder' => 'Confirm new password...',
                            ])->label('Confirm New password', [
                                'class' => 'col-sm-2 control-label',
                            ]) ?>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php echo Html::submitButton('Save changes', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>

                        <br>
                        <hr>
                        <br>

                        <div class="form-group">
                            <strong>
                                <?php echo Html::encode('You can delete your account here:') ?>
                            </strong>
                            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
