<?php

namespace app\controllers;

use app\models\FormUpdate;
use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;


/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view','update','_form','_search','index'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['view','update','_form','_search','index'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                                //Llamada al método que comprueba si es un administrador
                                return User::isUserAdmin(Yii::$app->user->identity->id);
                            },
                    ],
                    [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        'actions' => [],
                        //Esta propiedad establece que tiene permisos
                        'allow' => false,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                                //Llamada al método que comprueba si es un usuario simple
                                return User::isUserSimple(Yii::$app->user->identity->id);
                            },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->redirect(["site/register"]);
            /*$this->render('/site/register', [
                'model' => $model,
            ]);*/
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /*$model2 = $this->findModel($id);//encuentra el modelo a travez del id o sea que es el modelo de la vista anterior.
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            //echo "redirect";
            return $this->redirect(['view', 'id' => $model2->id]);
        } else {*/
        //Creamos la instancia con el model de validación
        $model = new FormUpdate;
        $model->id = $id;
        $usuario = Users::findOne(['id' => $id]);
        $model->username = $usuario->username;
        $model->password = $usuario->password;

        //Mostrará un mensaje en la vista cuando el usuario se haya registrado
        $msg = null;
        //Validación mediante ajax
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        //Validación cuando el formulario es enviado vía post
        //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
        //También previene por si el usuario tiene desactivado javascript y la
        //validación mediante ajax no puede ser llevada a cabo
        if ($model->load(Yii::$app->request->post()))
        {
            var_dump($model);
            if($model->validate())
            {
                //Preparamos la consulta para guardar el usuario
                $table = Users::findOne(['id' => $id]);
                $table->username = $model->username;
                //$table->email = $model->email;
                //control por si no cambia el usuario, sino lo cambia no lo guardo xq el valor que cargo en el
                //no es el del pass sino el encriptado
                if($model->password != $usuario->password){
                    //Encriptamos el password
                    $table->password = crypt($model->password, Yii::$app->params["salt"]);
                }
                //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
                //clave será utilizada para activar el usuario
                $table->authKey = $this->randKey("abcdef0123456789", 200);
                //Creamos un token de acceso único para el usuario
                $table->accessToken = $this->randKey("abcdef0123456789", 200);
                $table->activate = 1;
                $table->id_rol = $model->id_rol;
                $table->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("update", ["model" => $model, "id" => $id ]);
        // }
    }

    private function randKey($str='', $long=0){
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
