<?php

namespace frontend\models;

use frontend\repositories\UserRepository;
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
    /* @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository, $config = [])
    {
        $this->userRepository = $userRepository;
        parent::__construct($config);
    }

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

        $user = $this->userRepository->findUserById(Yii::$app->request->queryParams['id']);
        $user->setPassword($this->new_password);

        return $user->save();
    }
}
