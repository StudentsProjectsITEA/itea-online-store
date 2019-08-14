<?php

namespace common\bootstrap;

use Yii;
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

    public function __construct()
    {
        $this->container = Yii::$container;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $this->container->setDefinitions([]);
    }
}
