<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\repositories\UserRepository;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="header-burger-menu"></div>
            <a href="<?php echo Url::to('/'); ?>" class="logoelem">
                <img src="<?php echo Url::to('@web/img/matter.png'); ?>" alt="logo"/>
            </a>
            <div class="header-contacts-block">
                <a href="#"><i class="fas fa-phone-square"></i>(093) 123 45 67</a>
                <a href="<?php echo Url::toRoute('contact', true); ?>">Contacts</a>
            </div>
            <form action="#" method="" class="main-search">
                <input type="text" class="main-search-input" placeholder="Search"/>
                <button type="submit" class="main-search-btn">Search</button>
            </form>

            <div class="header-icons">
                <button class="header-login-btn" id="logInBtn">Log in</button>
                <div class="user-info">

                    <div class="user-avatar"><a href="<?php echo Url::to([
                            'user/view', 'id' => (new UserRepository())->findUserByName('Vasya')->id,
                        ]) ?>"><img alt="user-avatar"
                                                  src="<?php echo Url::to('@web/img/featured.png'); ?>"></div>
                    Vasya Pupkin</a>
                </div>
            </div>
            <a href="<?php echo Url::toRoute('cart', true); ?>" class="header-icon"><i class="fas fa-shopping-cart"></i><span
                        class="header-cart-amount">0</span></a>
        </div>
    </div>
</header>

<div class="modal-backdrop hidden" id="loginModal">
    <div>
        <div class="login-menu">
            <div class="login-cancel-btn">x</div>
            <h2 class="login-menu_header">Log in</h2>
            <p class="login-menu_par">Please enter your account details</p>
            <form class="login-menu_form">
                <div class="field-wrapper">
                    <label class="login-form-input-title">E-mail
                        <input name="email" type="text" placeholder="Your email..." class="login-form-input"
                               value=""/>
                    </label>
                    <label class="login-form-input-title">Password
                        <input name="password" type="password" placeholder="Your password..."
                               class="login-form-input" value=""/>
                    </label>
                </div>
                <button type="submit" class="login-form_btn">
                    Log In
                </button>
            </form>
            <div class="registration-area">
                <div id="registerBtnLink" class="login-form_btn register_btn">
                    Register Here
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop hidden" id="registrationModal">
    <div>
        <div class="login-menu">
            <div class="login-cancel-btn">x</div>
            <h2 class="login-menu_header">Registration</h2>
            <form class="login-menu_form" method="POST" action="#">
                <div class="login-menu_form-fields">
                    <label class="login-form-input-title">First Name<input name="firstName" type="text"
                                                                           placeholder="Your first name..."
                                                                           class="login-form-input" value=""/></label>

                    <label class="login-form-input-title">Last Name<input name="secondName" type="text"
                                                                          placeholder="Your last name..."
                                                                          class="login-form-input" value=""/></label>

                    <label class="login-form-input-title">Email Address<input name="email" type="email"
                                                                              placeholder="Your email..."
                                                                              class="login-form-input"
                                                                              value=""/></label>

                    <label class="login-form-input-title">Password<input name="password" type="password"
                                                                         placeholder="Your password..."
                                                                         class="login-form-input" value=""/></label>

                    <label class="login-form-input-title">Confirm Password<input name="password2" type="password"
                                                                                 placeholder="Your password..."
                                                                                 class="login-form-input"
                                                                                 value=""/></label>
                </div>
                <button name="registrationSbm" type="submit" class="login-form_btn" label="submit">
                    Register
                </button>
            </form>
            <div class="registration-area">
                <div id="logInModalLink" class="login-form_btn register_btn">
                    Login Here
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="footer-list">
            <div class="footer-column">
                <img src="<?php echo Url::to('@web/img/matter.png'); ?>" alt="">
            </div>
            <div class="footer-menu">
                <div class="footer-menu-column">
                    <h3 class="footer-menu-column-title">Account</h3>
                    <ul class="footer-column-list">
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('account', true); ?>" class="footer-column-link">My Account</a></li>
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('cart', true); ?>" class="footer-column-link">Cart</a></li>
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('checkout', true); ?>" class="footer-column-link">Checkout</a></li>
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('about', true); ?>" class="footer-column-link">About</a></li>
                    </ul>
                </div>
                <div class="footer-menu-column">
                    <h3 class="footer-menu-column-title">Customer service</h3>
                    <ul class="footer-column-list">
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('product', true); ?>" class="footer-column-link">Product detail view</a></li>
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('products', true); ?>" class="footer-column-link">All products</a></li>
                        <li class="footer-column-item"><a href="<?php echo Url::toRoute('contact', true); ?>" class="footer-column-link">Contact us</a></li>
                        <li class="footer-column-item"><a href="" class="footer-column-link">Product Care</a></li>
                    </ul>
                </div>
                <div class="footer-menu-column">
                    <h3 class="footer-menu-column-title">Contact us</h3>
                    <p class="footer-contacts-address">26A Pagoda St, TANGS, Singapore, 058187</p>
                    <a href="" class="footer-contacts-phone">+65 6221 5462</a>
                </div>
            </div>

            <div class="footer-column footer-action-icon">
                <a href="" class="footer-action-item"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="footer-action-item"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
