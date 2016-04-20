<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormUpdate extends model{

    public $id;
    public $username;
    //public $email;
    public $password;
    public $id_rol;

    public function rules()
    {
        return [
            [['username', 'password','id_rol'], 'required', 'message' => 'Campo requerido'],
            ['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['password', 'match', 'pattern' => "/^.{6,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
        ];
    }

    /**
     * public function email_existe($attribute, $params)
    {

        //Buscar el email en la tabla
        $table = Users::find()->where("email=:email", [":email" => $this->email]);

        //Si el email existe mostrar el error
        if ($table->count() == 1)
        {
            $this->addError($attribute, "El email seleccionado existe");
        }
    }*/


}
?>