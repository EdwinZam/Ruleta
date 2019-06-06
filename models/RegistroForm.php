<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class RegistroForm extends Model
{
    //public $username;
    public $email;
    public $password;
	public $rol;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Esta dirección de correo electrónico ya se ha asignado.'],
			
			['rol', 'trim'],
            ['rol', 'required'],
            ['rol', 'string', 'min' => 1, 'max' => 255],
			
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function registro()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->email = $this->email;
		$user->id_rol = $this->rol;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
