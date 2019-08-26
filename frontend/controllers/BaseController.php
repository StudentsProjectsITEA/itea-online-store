<?php

namespace frontend\controllers;

use frontend\repositories\UserRepository;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class BaseController extends Controller
{
    /* @var UserRepository */
    protected $userRepository;

    /**
     * SiteController constructor.
     * {@inheritdoc}
     * @param UserRepository $userRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        UserRepository $userRepository,
        $config = []
    )
    {
        $this->layout = 'main-layout';
        $this->userRepository = $userRepository;
        if (!Yii::$app->user->isGuest) {
            $view = $this->getView();
            $model = $this->userRepository->findUserById(Yii::$app->user->id);
            $view->params['identityId'] = $model->id;
            $view->params['identityFirstName'] = $model->first_name;
            $view->params['identityLastName'] = $model->last_name;
        }
        parent::__construct($id, $module, $config);
    }
}