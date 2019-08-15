<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */
/* @var $brandId string */

$this->title = 'Create Brand';
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'brandId' => $brandId,
    ]) ?>

</div>
