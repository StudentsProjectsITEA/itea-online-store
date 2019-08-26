<?php


namespace backend\controllers;

use backend\repositories\AdminRepository;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class BaseController extends Controller
{
    /** @var AdminRepository $adminRepository */
    protected $adminRepository;

    /**
     * SiteController constructor.
     * {@inheritdoc}
     * @param AdminRepository $adminRepository
     * @throws NotFoundHttpException
     */
    public function __construct(
        $id,
        $module,
        AdminRepository $adminRepository,
        $config = []
    )
    {
        $this->adminRepository = $adminRepository;
        if (!Yii::$app->user->isGuest) {
            $this->layout = 'main-layout';
            $view = $this->getView();
            $model = $this->adminRepository->findAdminById(Yii::$app->user->id);
            $view->params['identityId'] = $model->id;
            $view->params['identityUsername'] = $model->username;
            $view->params['identityEmail'] = $model->email;
            $view->params['createdTime'] = $model->created_time;
        }
        parent::__construct($id, $module, $config);
    }
}