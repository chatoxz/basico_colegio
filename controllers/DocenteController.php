<?php

namespace app\controllers;

use app\models\Persona;
use app\models\User;
use Yii;
use app\models\Docente;
use app\models\DocenteSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocenteController implements the CRUD actions for Docente model.
 */
class DocenteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view','update','_form','index'],
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
     * Lists all Docente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docente model.
     * @param integer $id_docente
     * @param integer $id_persona
     * @return mixed
     */
    public function actionView($id_docente, $id_persona)
    {
        $docente = $this->findModel($id_docente, $id_persona);
        $persona = Persona::findOne($id_persona);
        return $this->render('view', ['persona' => $persona,'docente' => $docente,]);
    }

    /**
     * Creates a new Docente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $docente = new Docente();
        $persona = new Persona();

        if ($docente->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post())) {
            $persona->save(); // skip validation as model is already validated
            $docente->id_persona = Yii::$app->db->getLastInsertID();
            if($docente->validate()){
                $docente->save();
            }
            return $this->redirect(['view', 'id_docente' => $docente->id_docente, 'id_persona' => $persona->id_persona]);
        } else {
            return $this->render('create', ['persona' => $persona,'docente' => $docente,]);
        }
    }

    /**
     * Updates an existing Docente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_docente
     * @param integer $id_persona
     * @return mixed
     */
    public function actionUpdate($id_docente, $id_persona)
    {
        $docente = $this->findModel($id_docente, $id_persona);
        $persona = Persona::findOne($id_persona);

        if ($docente->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post()) && Model::validateMultiple([$persona, $docente]) ) {
            $persona->save();
            /*$foto = $persona->foto;
            $image = $_POST['foto'];
            //Stores the filename as it was on the client computer.
            $imagename = $_FILES['foto']['name'];
            //Stores the filetype e.g image/jpeg
            $imagetype = $_FILES['foto']['type'];
            //Stores any error codes from the upload.
            $imageerror = $_FILES['foto']['error'];
            //Stores the tempname as it is given by the host when uploaded.
            $imagetemp = $_FILES['foto']['tmp_name'];

            //The path you wish to upload the image to
            $imagePath = "C:/wamp/www/basico_colegio/web/fotos_personas";

            if(is_uploaded_file($imagetemp)) {
                if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                    echo "Sussecfully uploaded your image.";
                }
                else {
                    echo "Failed to move your image.";
                }
            }
            else {
                echo "Failed to upload your image.";
            }*/
            $docente->save();
            return $this->redirect(['view', 'id_docente' => $docente->id_docente, 'id_persona' => $docente->id_persona]);
        } else {
            return $this->render('update', ['persona' => $persona,'docente' => $docente,]);
        }
    }

    /**
     * Deletes an existing Docente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_docente
     * @param integer $id_persona
     * @return mixed
     */
    public function actionDelete($id_docente, $id_persona)
    {
        $this->findModel($id_docente)->delete();
        $persona = Persona::findOne($id_persona);
        $persona->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Docente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Docente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
