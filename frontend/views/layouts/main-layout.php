<?php

/* @var $this View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('header') ?>

<?php if (isset($this->params['breadcrumbs'])): ?>
    <section class="breadcrumbs-section">
        <div class="container">
            <?php echo Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'],
                'options' => [
                    'class' => 'breadcrumbs-list',
                ],
            ]) ?>
        </div>
    </section>
<?php endif; ?>

<div class="container">
    <?php echo Alert::widget() ?>
    <?php echo $content ?>
</div>

<?php echo $this->render('footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
