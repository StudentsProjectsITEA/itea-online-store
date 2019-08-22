<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<footer class="main-footer">
    <div class="container">
        <div class="footer-list">
            <div class="footer-column">
                <?php echo Html::img('@web/img/matter.png', ['alt' => '']) ?>
            </div>
            <div class="footer-menu">
                <div class="footer-menu-column">
                    <h3 class="footer-menu-column-title">
                        <?php echo Html::encode('Store') ?>
                    </h3>
                    <ul class="footer-column-list">
                        <li class="footer-column-item">
                            <a href="<?php echo Url::to('/products'); ?>" class="footer-column-link">
                                <?php echo Html::encode('All products') ?>
                            </a>
                        </li>
                        <li class="footer-column-item">
                            <a href="<?php echo Url::to('/cart'); ?>" class="footer-column-link">
                                <?php echo Html::encode('Cart') ?>
                            </a>
                        </li>
                        <li class="footer-column-item">
                            <a href="<?php echo Url::to('/checkout'); ?>" class="footer-column-link">
                                <?php echo Html::encode('Checkout') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-menu-column">
                    <h3 class="footer-menu-column-title">
                        <?php echo Html::encode('Information') ?>
                    </h3>
                    <ul class="footer-column-list">
                        <li class="footer-column-item">
                            <a href="<?php echo Url::to('/about'); ?>" class="footer-column-link">
                                <?php echo Html::encode('About') ?>
                            </a>
                        </li>
                        <li class="footer-column-item">
                            <a href="<?php echo Url::to('/contact'); ?>" class="footer-column-link">
                                <?php echo Html::encode('Contacts') ?>
                            </a>
                        </li>
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
