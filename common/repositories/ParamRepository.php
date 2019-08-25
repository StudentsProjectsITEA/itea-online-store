<?php

namespace common\repositories;

use common\models\Param;
use yii\web\NotFoundHttpException;

class ParamRepository
{
    /**
     * Finds the Param model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Param the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findParamById($id)
    {
        if (($model = Param::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}