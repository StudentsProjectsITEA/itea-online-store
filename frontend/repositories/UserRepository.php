<?php

namespace frontend\repositories;

use frontend\models\User;
use yii\web\NotFoundHttpException;

class UserRepository
{
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findUserById($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param string $name
     *
     * @return User|null
     */
    public function findUserByName(string $name)
    {
        return User::findOne(['first_name' => $name]);
    }
}