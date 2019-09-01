<?php

/* @var $this View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Menu;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Url::to('@web/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo Html::encode($this->params['identityUsername']) ?>
                </p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    <?php echo Html::encode('Online') ?>
                </a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        echo Menu::widget([
            'items' => [
                ['label' => 'MAIN NAVIGATION',
                    'options' => ['class' => 'header'],
                ],
                ['label' => 'Account',
                    'url' => ['/admin/view', 'id' => $this->params['identityId']],
                    'template' => '<a href="' . "{url}" . '"><i class="fa fa-user-circle"></i><span>{label}</span></a>',
                ],
                ['label' => 'Admins',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-user-o"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/admin/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/admin/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-user-plus"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All admins',
                            'url' => ['/admin/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-users"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Users',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-user"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/user/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/user/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-user-plus"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All users',
                            'url' => ['/user/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-users"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Orders',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-clipboard"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/order/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/order/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All orders',
                            'url' => ['/order/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-list"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Products',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-shirtsinbulk"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/product/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/product/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All products',
                            'url' => ['/product/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-list"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Categories',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-sitemap"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/category/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/category/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All categories',
                            'url' => ['/category/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-list"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Brands',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-life-ring"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/brand/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/brand/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All brands',
                            'url' => ['/brand/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-list"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Params',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-cube"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/param/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/param/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All params',
                            'url' => ['/param/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-cubes"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Photos',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-photo"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Search',
                            'url' => ['/photo/search'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-search"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Create',
                            'url' => ['/photo/create'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-android-create"></i>{label}</a>',
                        ],
                        [
                            'label' => 'All photos',
                            'url' => ['/photo/index'],
                            'template' => '<a href="' . "{url}" . '"><i class="ion ion-ios-photos-outline"></i>{label}</a>',
                        ],
                    ],
                ],
            ],
            'options' => [
                'class' => 'sidebar-menu',
                'data-widget' => 'tree',
            ],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
        ]);
        ?>

        <?php
        echo Menu::widget([
            'items' => [
                ['label' => 'LABELS',
                    'options' => ['class' => 'header'],
                ],
                ['label' => 'Important',
                    'template' => '<a href="#"><i class="fa fa-circle-o text-red"></i><span>{label}</span></a>',
                ],
                ['label' => 'Warning',
                    'template' => '<a href="#"><i class="fa fa-circle-o text-yellow"></i><span>{label}</span></a>',
                ],
                ['label' => 'Information',
                    'template' => '<a href="#"><i class="fa fa-circle-o text-aqua"></i><span>{label}</span></a>',
                ],
            ],
            'options' => [
                'class' => 'sidebar-menu',
                'data-widget' => 'tree',
            ],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
        ]);
        ?>

    </section>
    <!-- /.sidebar -->
</aside>
