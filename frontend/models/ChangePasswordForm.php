<?php

namespace frontend\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    private $messages = [
        'validate-fail-1' => 'Your password is wrong.',
        'validate-fail-2' => 'Your new password is not the same as your confirmation password.',
    ];
    public $password;
    public $new_password;
    public $confirm_new_password;

    public function rules()
    {
        return [
            // username и password обязательны для заполнения
            [['password', 'new_password', 'confirm_new_password'], 'required'],
            // проверке пароля с помощью validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    /**
     * @return bool|null
     *
     * @throws Exception
     */
    public function changePassword()
    {
        if (!$this->validatePassword()) {
            return null;
        }

        $user = User::findIdentity(Yii::$app->request->queryParams['id']);
        $user->setPassword($this->new_password);

        return $user->save();
    }

    /**
     * @return bool
     */
    public function validatePassword()
    {
        $user = User::findIdentity(Yii::$app->request->queryParams['id']);

        if (!$user || !$user->validatePassword($this->password)) {
            Yii::$app->session->setFlash('error', $this->messages['validate-fail-1']);
            $this->addError('password', $this->messages['validate-fail-1']);

            return false;
        }

        if ($this->new_password !== $this->confirm_new_password) {
            Yii::$app->session->setFlash('error', $this->messages['validate-fail-2']);
            $this->addError('password', $this->messages['validate-fail-2']);

            return false;
        }

        return true;
    }
}
