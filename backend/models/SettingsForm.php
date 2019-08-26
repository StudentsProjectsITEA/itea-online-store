<?php

namespace backend\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class SettingsForm extends Model
{
    private $message = [
        'wrong' => 'Your password is wrong.',
        'password' => 'Password must contain at least one lowercase letter, one uppercase letter and one number.',
        'username' => 'You can use letters, numbers and underscore.',
        'email' => 'Email must be correct.',
    ];
    private $regularWord = [
        'password' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        'username' => '/^[a-z]\w*$/i',
        'email' => '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,8})$/',
    ];
    public $username;
    public $email;
    public $new_password;
    public $confirm_new_password;

    public function rules()
    {
        return [
            [['username', 'email'], 'trim'],

            ['username', 'match', 'pattern' => $this->regularWord['username'], 'message' => $this->message['username']],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'match', 'pattern' => $this->regularWord['email'], 'message' => $this->message['email']],

            [['new_password', 'confirm_new_password'], 'string', 'min' => 8],
            ['new_password', 'compare', 'compareAttribute' => 'confirm_new_password'],
            ['new_password', 'match', 'pattern' => $this->regularWord['password'], 'message' => $this->message['password']],
        ];
    }


    /**
     * @return bool|null
     *
     * @throws Exception
     */
    public function changeInformation()
    {
        if (!$this->validate()) {
            return null;
        }

        $admin = Admin::findOne(Yii::$app->request->queryParams['id']);
        if ($admin->username !== $this->username) {
            $admin->username = $this->username;
        }
        if ($admin->email !== $this->email) {
            $admin->email = $this->email;
        }
        $admin->setPassword($this->new_password);

        return $admin->save();
    }
}
