<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <br>
    <div class="col-sm-3">
        <strong>
            <?php echo Html::encode('You can create new brand here:') ?>
        </strong>
    </div>
    <div class="col-sm-9">
        <p>
            <?php echo Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <br>

    <section class="content" style="float: left;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php echo Html::encode('Brands table list:') ?>
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
                                'id:text',
                                'name:text',
                                'description:ntext',
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
