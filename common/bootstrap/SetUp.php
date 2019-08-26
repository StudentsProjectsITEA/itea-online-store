<?php

namespace common\bootstrap;

use backend\models\AdminSearch;
use backend\models\BrandSearch;
use backend\models\OrderSearch;
use backend\models\ParamSearch;
use backend\repositories\AdminRepository;
use common\components\OrderDetailsViewer;
use common\helpers\OrderDetails;
use common\models\CategorySearch;
use common\models\PhotoSearch;
use common\repositories\BrandRepository;
use common\repositories\OrderRepository;
use common\repositories\ParamRepository;
use common\repositories\PhotoRepository;
use frontend\components\CartViewer;
use frontend\models\LoginForm;
use backend\models\LoginForm as AdminLogin;
use frontend\models\SignupForm;
use common\models\ProductSearch;
use common\repositories\CategoryRepository;
use frontend\models\ChangePasswordForm;
use frontend\repositories\UserRepository;
use common\components\CategoryViewer;
use common\components\ProductViewer;
use common\repositories\ProductRepository;
use yii\base\Application;
use yii\base\BootstrapInterface;
use Yii;

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
        $this->container->setSingleton(AdminRepository::class);
        $this->container->setSingleton(BrandRepository::class);
        $this->container->setSingleton(OrderRepository::class);
        $this->container->setSingleton(ParamRepository::class);
        $this->container->setSingleton(PhotoRepository::class);

        $this->container->setSingleton(CategoryViewer::class);
        $this->container->setSingleton(ProductViewer::class);
        $this->container->setSingleton(CartViewer::class);
        $this->container->setSingleton(OrderDetailsViewer::class);

        $this->container->setSingleton(SignupForm::class);
        $this->container->setSingleton(LoginForm::class);
        $this->container->setSingleton(ChangePasswordForm::class);
        $this->container->setSingleton('adminLogin', AdminLogin::class);

        $this->container->setSingleton(AdminSearch::class);
        $this->container->setSingleton(ProductSearch::class);
        $this->container->setSingleton(BrandSearch::class);
        $this->container->setSingleton(CategorySearch::class);
        $this->container->setSingleton(OrderSearch::class);
        $this->container->setSingleton(ParamSearch::class);
        $this->container->setSingleton(PhotoSearch::class);

        $this->container->setSingleton(OrderDetails::class);

    }
}
