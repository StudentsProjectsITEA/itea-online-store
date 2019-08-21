<?php

use common\models\Product;
use common\repositories\ProductRepository;
use yii\data\Pagination;
use yii\widgets\ListView;

/* @var $allProducts array */
/* @var $pagination Pagination */
/* @var $productsFind ProductRepository */
/* @var $dataProvider Product[]
 */

?>

<section class="section-listing-products">
    <div class="container">
        <div class="listing">
            <h2 class="listing-title">All products:</h2>
            <?php echo ListView::widget([
                'options' => ['class' => 'listing-products'],
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'product-item'],
                'itemView' => 'listing-product',
                'layout' => "{items}\n{pager}",
                'pager' => [
                    'maxButtonCount' => Yii::$app->params['maxButtonPaginationCount'],
                    'options' => [
                        'tag' => 'ul',
                        'class' => 'store-pagination',
                    ],
                    'linkOptions' => [
                        'tag' => 'li',
                    ],
                    'activePageCssClass' => 'active',
                    'prevPageLabel' =>  '<li class="nav-links"><i class="fas fa-arrow-left"></i></li>',
                    'nextPageLabel' =>  '<li class="nav-links"><i class="fas fa-arrow-right"></i></li>',
                    'nextPageCssClass' => 'hide',
                ],
            ]) ?>
        </div>
    </div>
</section>
