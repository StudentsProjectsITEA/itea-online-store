<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <br>
    <div class="col-sm-3">
        <strong>
            <?php echo Html::encode('You can create new user here:') ?>
        </strong>
    </div>
    <div class="col-sm-9">
        <p>
            <?php echo Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <br>

    <section class="content" style="float: left;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php echo Html::encode('Users table list:') ?>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions' => [
                                'class' => 'table table-bordered table-hover dataTable',
                                'id' => 'example2',
                                'role' => 'grid',
                                'aria-describedby' => 'example2_info',
                            ],
                            'columns' => [
                                'id',
                                'username',
                                'first_name',
                                'last_name',
                                'mobile',
                                'auth_key',
                                'password_hash',
                                'password_reset_token',
                                'email:email',
                                'verification_token',
                                'status_id',
                                'created_time:datetime',
                                'updated_time:datetime',
                                [
                                    'class' => ActionColumn::class,
                                    'header' => 'Action',
                                    'template' => '{view} {update}',
                                    'buttons' => [
                                        'view' => function ($url, $model, $key) {
                                            return Html::a('<span class="fa fa-eye"></span>', $url);
                                        },
                                        'update' => function ($url, $model, $key) {
                                            return Html::a('<span class="fa fa-pencil"></span>', $url);
                                        },
                                    ],
                                ],
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
