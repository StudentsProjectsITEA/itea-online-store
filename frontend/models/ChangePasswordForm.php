<?php

namespace frontend\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    private $message = [
        'wrong' => 'Your password is wrong.',
        'password' => 'Password must contain at least one lowercase letter, one uppercase letter and one number.',
    ];
    private $regularWord = [
        'password' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
    ];
    public $password;
    public $new_password;
    public $confirm_new_password;

    public function rules()
    {
        return [
            [['password', 'new_password', 'confirm_new_password'], 'required'],
            [['password', 'new_password', 'confirm_new_password'], 'string', 'min' => 8],
            ['new_password', 'compare', 'compareAttribute' => 'confirm_new_password'],
            ['new_password', 'match', 'pattern' => $this->regularWord['password'], 'message' => $this->message['password']],
        ];
    }


    /**
     * @return bool|null
     *
     * @throws Exception
     */
    public function changePassword()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne(Yii::$app->request->queryParams['id']);
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
            Yii::$app->session->setFlash('error', $this->message['wrong']);
            $this->addError('password', $this->message['wrong']);

            return false;
        }

        return true;
    }
}
