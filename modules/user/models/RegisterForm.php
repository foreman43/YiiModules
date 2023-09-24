<?php

namespace app\modules\user\models;

use yii\base\Model;
use Yii;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public string $first_name = '';
    public string $last_name = '';
    public string $patronymic = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $passwordRepeat = '';
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'password','passwordRepeat'], 'required'],
            ['patronymic', 'safe'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'max' => 25],
            [['patronymic'], 'string', 'max' => 25],
            ['email', 'email'],
            ['phone', 'string', 'max' => 15],
            ['password', 'string', 'min' => 5, 'max' => 40],
            ['email', 'validateEmail'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['verifyCode', 'captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function register(): bool
    {
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->patronymic = $this->patronymic;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->access_token = Yii::$app->security->generateRandomString();

        if($user->save())
        {
            Yii::$app->user->login($user, 0);
            return true;
        }
        else
        {
            Yii::error('User not saved in DB.'.VarDumper::dump($user->errors));
            return false;
        }
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->avaliableEmail($this->email)) {
                $this->addError($attribute, 'This user is already exist.');
            }

            /*Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setBcc('roobi902@gmail.com')
                ->setSubject('Подтверждение Email')
                ->setTextBody('Тестовый текст')
                ->send();*/
            //todo: finish validation
            //todo: fix error 535

        }
    }

    public function getUser()
    {
        return User::findByEmail($this->email);
    }
}