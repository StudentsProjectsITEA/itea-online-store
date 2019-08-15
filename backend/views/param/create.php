<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Param */
/* @var $paramId string */

$this->title = 'Create Param';
$this->params['breadcrumbs'][] = ['label' => 'Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="param-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('form', [
        'model' => $model,
        'paramId' => $paramId,
    ]) ?>

</div>
