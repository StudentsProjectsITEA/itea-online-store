<?php

namespace common\repositories;

use common\models\Photo;
use yii\web\NotFoundHttpException;

class PhotoRepository
{
    /**
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Photo|null
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findPhotoById($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}