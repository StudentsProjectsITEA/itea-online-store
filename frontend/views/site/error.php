<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1 class="sub-page__title"><?php echo Html::encode($this->title) ?></h1>

    <div class="about-us__title alert">
        <br>
        <?php echo nl2br(Html::encode($message)) ?>
        <br><br>
    </div>
    <p class="about-us__paragraph">
        <?php echo Html::encode('The above error occurred while the Web server was processing your request.') ?>
    </p>
    <p class="about-us__paragraph">
        <?php echo nl2br(Html::encode('Please contact us if you think this is a server error. Thank you.')) ?>
    </p>

</div>
