<?php

use backend\models\Admin;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search admins';
$this->params['breadcrumbs'][] = ['label' => 'All admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <?php echo $this->render('search-form', ['model' => $searchModel]); ?>

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            /* @var $model Admin */
            return Html::a(Html::encode($model->username), ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>
