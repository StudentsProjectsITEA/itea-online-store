<?php

use frontend\repositories\UserRepository;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="header-burger-menu"></div>
            <a href="<?php echo Url::to('/'); ?>" class="logoelem">
                <?php echo Html::img('@web/img/matter.png', ['alt' => 'logo']) ?>
            </a>
            <div class="header-contacts-block">
                <a href="#">
                    <i class="fas fa-phone-square"></i><?php echo Html::encode('(093) 123 45 67') ?>
                </a>
                <a href="<?php echo Url::to('/contact'); ?>">
                    <?php echo Html::encode('Contacts') ?>
                </a>
            </div>
            <?php echo Html::beginForm(['/product/index'], 'get', ['class' => 'main-search']) ?>
            <?php echo Html::textInput('search', Yii::$app->request->queryParams['search'] ?? '', [
                'class' => 'main-search-input',
                'placeholder' => 'Search',
            ]) ?>
            <?php echo Html::submitButton('Search', ['class' => 'main-search-btn']) ?>
            <?php echo Html::endForm(); ?>
            <div class="header-icons">
                <button class="header-login-btn" id="logInBtn">
                    <?php echo Html::encode('Log in') ?>
                </button>
                <a href="<?php echo Url::to([
                    'user/view',
                    'id' => (new UserRepository())->findUserByName('Vasya')->id,
                ]) ?>">
                    <div class="user-info">
                        <div class="user-avatar">
                            <img alt="user-avatar" src="<?php echo Url::to('@web/img/featured.png'); ?>">
                        </div>
                        <?php echo Html::encode('Vasya Pupkin') ?>
                    </div>
                </a>
            </div>
            <a href="<?php echo Url::to('/cart'); ?>" class="header-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="header-cart-amount"><?php echo Yii::$app->cart->getTotalCount() ?></span>
            </a>
        </div>
    </div>
</header>
