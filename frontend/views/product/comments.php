<?php

use yii\helpers\Url;

/* @var $model common\models\Product */
?>

<div class="product-tabs-item" data-target="comments">
    <ul class="comments-list">
        <li>
            <div class="user-photo">
                <img src="<?php echo Url::to('@web/img/featured.png'); ?>" alt="user-photo">
            </div>

            <p>Very good mf item. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam cum
                consequatur sint, quis voluptatem vitae reiciendis eius repudiandae ullam, incidunt nemo
                praesentium laudantium soluta nihil maxime beatae, nostrum numquam? Unde.</p>
        </li>
        <li>
            <div class="user-photo">
                <!-- no-photo --> <img src="<?php echo Url::to('@web/img/account.png'); ?>" alt="user-photo">
            </div>

            <p>Very good mf item. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam cum
                praesentium laudantium soluta nihil maxime beatae, nostrum numquam? Unde.</p>
        </li>
    </ul>
    <form action="#" method="POST" class="comments-add-form">
        <label>
            <textarea class="comments-input"></textarea>
        </label>
        <button class="comments-add-new">Add new comment</button>
    </form>
</div>
