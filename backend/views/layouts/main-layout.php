<?php

/* @var $this View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">

<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <?php echo $this->render('header') ?>

    <?php echo $this->render('left-sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="overflow-x: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo Html::encode($this->title) ?>
            </h1>
            <?php if (isset($this->params['breadcrumbs'])): ?>
                <?php echo Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'tag' => 'ol',
                    'homeLink' => [
                        'url' => '/admin',
                        'label' => '<i class="fa fa-dashboard"></i> Home',
                        'encode' => false,
                    ],
                ]) ?>
            <?php endif; ?>
        </section>

        <?php echo Alert::widget() ?>
        <?php echo $content ?>

    </div>

</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
