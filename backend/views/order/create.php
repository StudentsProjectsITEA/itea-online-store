<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $orderId string */
/* @var $statusId int */
/* @var $paymentId int */
/* @var $shippingId int */
/* @var $createdTime string */
/* @var $updatedTime string */
/* @var $userId string */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'orderId' => $orderId,
        'statusId' => $statusId,
        'paymentId' => $paymentId,
        'shippingId' => $shippingId,
        'createdTime' => $createdTime,
        'updatedTime' => $updatedTime,
        'userId' => $userId,
    ]) ?>

</div>
