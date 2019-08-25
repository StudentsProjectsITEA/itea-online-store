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
                    'template' => '<a href="' . "{url}" . '"><i class="fa fa-user"></i><span>{label}</span></a>',
                ],
                ['label' => 'Forms',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-edit"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'General Elements',
                            'url' => ['/site/general-forms'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-circle-o"></i>{label}</a>',
                        ],
                        [
                            'label' => 'Advanced Elements',
                            'url' => ['/site/advanced-forms'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-circle-o"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Tables',
                    'options' => ['class' => 'treeview'],
                    'template' => '<a href="#"><i class="fa fa-table"></i><span>{label}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>',
                    'items' => [
                        [
                            'label' => 'Simple tables',
                            'url' => ['site/simple-tables'],
                            'template' => '<a href="' . "{url}" . '"><i class="fa fa-circle-o"></i>{label}</a>',
                        ],
                    ],
                ],
                ['label' => 'Simple Page',
                    'url' => ['site/blank'],
                    'template' => '<a href="' . "{url}" . '"><i class="fa fa-paste"></i><span>{label}</span></a>',
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
