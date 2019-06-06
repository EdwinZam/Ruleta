<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\User;

class UserPasswordChange extends Model
{
    public $password;

    /**
     * @var \app\models\User
     */
    private $_user;

    public function __construct()
    {
       $id= Yii::$app->user->identity->id;
        $this->_user = User::findIdentity($id);
       
        
    }
     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function changePassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save(false);
    }
   
}

