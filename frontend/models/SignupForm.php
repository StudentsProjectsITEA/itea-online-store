<?php

namespace frontend\models;

use Exception;
use Yii;
use yii\base\Model;
use Ramsey\Uuid\Uuid;

/**
 * Signup form
 */
class SignupForm extends Model
{
    private $message = [
        'uniqueUsername' => 'This username has already been taken.',
        'uniqueEmail' => 'This email address has already been taken.',
        'username' => 'You can use letters, numbers and underscore.',
        'name' => 'You can use letters, apostrophe and space.',
        'password' => 'Password must contain at least one lowercase letter, one uppercase letter and one number.',
        'email' => 'Email must be correct.',
    ];
    private $regularWord = [
        'username' => '/^[a-z]\w*$/i',
        'name' => '/^([a-zA-Zа-яА-Я\' ]+)$/ui',
        'password' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        'email' => '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,8})$/'
    ];
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'email'], 'trim'],
            [['username', 'first_name', 'last_name', 'email', 'password', 'confirm_password'], 'required'],

            [['first_name', 'last_name'], 'match', 'pattern' => $this->regularWord['name'], 'message' => $this->message['name']],
            [['username', 'first_name', 'last_name'], 'string', 'min' => 2, 'max' => 255],

            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => $this->message['uniqueUsername']],
            ['username', 'match', 'pattern' => $this->regularWord['username'], 'message' => $this->message['username']],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => $this->message['uniqueEmail']],
            ['email', 'match', 'pattern' => $this->regularWord['email'], 'message' => $this->message['email']],

            [['password', 'confirm_password'], 'string', 'min' => 8],
            ['password', 'compare', 'compareAttribute' => 'confirm_password'],
            ['password', 'match', 'pattern' => $this->regularWord['password'], 'message' => $this->message['password']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     *
     * @throws Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->id = Uuid::uuid4()->toString();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->status_id = 10;
        $user->created_time = time();
        $user->updated_time = time();
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
