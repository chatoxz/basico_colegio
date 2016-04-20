<?php


namespace app\models;
use Yii;
use yii\base\model;



//se accede a travez del link http://localhost/basico/web/index.php?r=site/register
class FormRegister extends model{

    public $username;
    //public $email;
    public $password;
    public $password_repeat;
    public $id_rol;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat','id_rol'], 'required', 'message' => 'Campo requerido'],
            ['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['username', 'username_existe'],
          /*  ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
            ['email', 'email_existe'],*/
            ['password', 'match', 'pattern' => "/^.{6,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],
            //['id_rol', 'match', 'pattern' => "/^{0-9}+$/", 'message' => 'Entre el 1 y 2'],
        ];
    }

    /*public function email_existe($attribute, $params)
    {

        //Buscar el email en la tabla
        $table = Users::find()->where("email=:email", [":email" => $this->email]);

        //Si el email existe mostrar el error
        if ($table->count() == 1)
        {
            $this->addError($attribute, "El email seleccionado existe");
        }
    }*/

    public function username_existe($attribute, $params)
    {
        //Buscar el username en la tabla
        $table = Users::find()->where("username=:username", [":username" => $this->username]);

        //Si el username existe mostarar el error
        if ($table->count() == 1)
        {
            $this->addError($attribute, "El usuario seleccionado existe");
        }
    }

}
?>