<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <br>
    <div class="col-sm-3">
        <strong>
            <?php echo Html::encode('You can create new order here:') ?>
        </strong>
    </div>
    <div class="col-sm-9">
        <p>
            <?php echo Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <br>

    <section class="content" style="float: left;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php echo Html::encode('Orders table list:') ?>
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
                                'status_id',
                                'payment_id',
                                'shipping_id',
                                'shipping_address',
                                'created_time:datetime',
                                'updated_time:datetime',
                                'user_id',
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
