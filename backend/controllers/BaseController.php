<?php


namespace backend\controllers;

use backend\repositories\AdminRepository;
use Yii;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BaseController extends Controller
{
    /** @var AdminRepository $repository */
    private $repository;

    /**
     * BaseController constructor.
     * {@inheritdoc}
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function __construct($id, $module, $config = [])
    {
        $this->repository = Yii::$container->get(AdminRepository::class);
        parent::__construct($id, $module, $config);
    }

    /**
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function beforeAction($action): bool
    {
        $view = $this->getView();
        $model = $this->repository->findAdminById(Yii::$app->user->id);
        $view->params['identityId'] = $model->id;
        $view->params['identityUsername'] = $model->username;
        $view->params['identityEmail'] = $model->email;
        $view->params['createdTime'] = $model->created_time;

        return parent::beforeAction($action);
    }
}