<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Photo */

$this->title = 'Update Photo: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'photoId' => null,
        'photoName' => null,
        'createdTime' => null,
        'productId' => null,
    ]) ?>

</div>
