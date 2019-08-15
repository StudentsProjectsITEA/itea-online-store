<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */
/* @var $photoId string */
/* @var $photoName string */
/* @var $createdTime int */
/* @var $productId string */

$this->title = 'Create Photo';
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'photoId' => $photoId,
        'photoName' => $photoName,
        'createdTime' => $createdTime,
        'productId' => $productId,
    ]) ?>

</div>
