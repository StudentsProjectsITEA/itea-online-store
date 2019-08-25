<?php

use common\repositories\CategoryRepository;
use yii\helpers\Html;

/* @var $allCategories array */
/* @var $categoriesFind CategoryRepository */
?>

<section class="sub-menu-wrapper">
    <div class="container">
        <div class="sub-menu-wrapper-inner">
            <div class="sub-menu-left">

                <?php foreach ($allCategories as $subCategory => $categories) : ?>
                    <div class="sub-menu-left-list">
                        <h2 class="sub-menu-left-title"><?php echo $subCategory; ?></h2>
                        <ul class="sub-menu-category-list">
                            <?php foreach ($categories as $category) : ?>
                                <li class="sub-menu-category-item">
                                    <?php echo Html::a($category,
                                        [
                                            '/products?' . $subCategory . '=on',
                                        ],
                                        [
                                            'class' => 'sub-menu-category-link'
                                        ])
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
