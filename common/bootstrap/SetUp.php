<?php

namespace common\bootstrap;

use Yii;
use common\repositories\CategoryRepository;
use frontend\models\ChangePasswordForm;
use frontend\repositories\UserRepository;
use common\components\CategoryViewer;
use common\components\ProductViewer;
use common\repositories\ProductRepository;
use frontend\repositories\PopularRepository;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * Class SetUp
 *
 * @package common\bootstrap
 */
class SetUp implements BootstrapInterface
{
    private $container;

    public function __construct ()
    {
        $this->container = Yii::$container;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap ($app)
    {
        $this->container->setSingleton(UserRepository::class);
        $this->container->setSingleton(CategoryRepository::class);
        $this->container->setSingleton(ProductRepository::class);
        $this->container->setSingleton(PopularRepository::class);

        $this->container->setSingleton(CategoryViewer::class);
        $this->container->setSingleton(ProductViewer::class);

        $this->container->setSingleton(ChangePasswordForm::class);
    }
}
