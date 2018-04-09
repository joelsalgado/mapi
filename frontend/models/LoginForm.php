<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 24/01/2018
 * Time: 04:04 PM
 */

namespace frontend\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model
{
    public $NOMBRE_USUARIO;
    public $PASSWORD_1;
    public $rememberMe = true;
    private $_user;

    public function rules()
    {
        return [
            // username and password are both required
            [['NOMBRE_USUARIO', 'PASSWORD_1'], 'required', 'message' => 'No debe estar en blanco'],
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['PASSWORD_1', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'NOMBRE_USUARIO' => 'Usuario',
            'PASSWORD_1' => 'Contraseña',
            'rememberMe' => 'Recuerdame',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->PASSWORD_1)) {
                $this->addError($attribute, 'Usuario o contraseña incorrecta');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Usuarios::findByUsername($this->NOMBRE_USUARIO);
        }


        return $this->_user;
    }
}
