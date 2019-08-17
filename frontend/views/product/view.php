<?php

use common\models\Param;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $category common\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$parentId = $category::findOne($model->category->parent_id)->name;
$parentId === 'root' ? null : $this->params['breadcrumbs'][] = ['label' => $parentId, 'url' => ['category/view', 'id' => $model->category->parent_id]];
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['category/view', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<section class="product-main container">
    <?php echo $this->render('slider', [
        'model' => $model,
    ]) ?>

    <?php echo $this->render('information', [
        'model' => $model,
    ]) ?>
</section>

<section>
    <div class="product-tabs">
        <ul class="product-tabs-options">
            <li data-target="description" class="active">Description</li>
            <li data-target="parameters">Additional parameters</li>
            <li data-target="comments">Comments</li>
        </ul>
        <div class="product-tabs-content">
            <div class="product-tabs-item active" data-target="description">
                <p class="product-description"><?php echo Html::encode($model->description) ?></p>
            </div>

            <?php echo $this->render('parameters', [
                'model' => $model,
            ]) ?>

            <?php echo $this->render('comments') ?>
        </div>
    </div>
</section>
