<?php

use backend\models\Admin;
use frontend\models\User;
use yii\BaseYii;

/**
 * Class Yii
 */
class Yii extends BaseYii
{
    /**
     * @var BaseApplication|ConsoleApplication|WebApplication the application instance
     */
    public static $app;
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = include __DIR__.'/vendor/yiisoft/yii2/classes.php';
Yii::$container = new yii\di\Container();
/**
 * Class BaseApplication
 * Used for properties that are identical for both WebApplication and ConsoleApplication.
 */
abstract class BaseApplication extends yii\base\Application
{
}

/**
 * Class WebApplication
 * Include only Web application related components here.
 *
 * @property \devanych\cart\Cart $cart
 */
class WebApplication extends yii\web\Application
{
}

/**
 * Class ConsoleApplication
 * Include only Console application related components here.

 //* @property \console\components\Uploader $uploader
 */
class ConsoleApplication extends yii\console\Application
{
}
