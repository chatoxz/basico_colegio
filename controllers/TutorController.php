<?php

namespace app\controllers;

use app\models\Persona;
use Yii;
use app\models\Tutor;
use app\models\TutorSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\InputFile;
use yii\web\UploadedFile;

/**
 * TutorController implements the CRUD actions for Tutor model.
 */
class TutorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tutor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutor model.
     * @param integer $id_tutor
     * @param integer $id_persona
     * @return mixed
     */
    public function actionView($id_tutor, $id_persona)
    {
        $tutor = $this->findModel($id_tutor, $id_persona);
        $persona = Persona::findOne($id_persona);
        return $this->render('view', ['persona' => $persona,'tutor' => $tutor,]);
    }

    /**
     * Original Creates a new Tutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

    public function actionCreate()
    {
    $model = new Tutor();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
    return $this->redirect(['view', 'id_tutor' => $model->id_tutor, 'id_persona' => $model->id_persona]);
    } else {
    return $this->render('create', [
    'model' => $model,
    ]);
    }
    }*/

    /**
     * 1er intento de create
     *
    /*public function actionCreate(){

    $persona = new Persona;
    $tutor = new Tutor();

    if ($persona->load(Yii::$app->request->post()) && $tutor->load(Yii::$app->request->post())
    && Model::validateMultiple([$persona, $tutor])) {
    echo "if";

    $persona->save(false); // skip validation as model is already validated
    $tutor->id_persona = $persona->id_persona; // no need for validation rule on user_id as you set it yourself
    $tutor-save(false);
    return $this->redirect(['view', 'id' => $persona->id]);
    } else {
    echo "else";
    //Validación cuando el formulario es enviado vía post
    //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
    //También previene por si el usuario tiene desactivado javascript y la
    //validación mediante ajax no puede ser llevada a cabo
    if ($persona->load(Yii::$app->request->post() ))
    {
    //echo "persona y tutor";
    // if(Model::validateMultiple([$persona, $tutor]))
    // {
    echo "persona";
    //Preparamos la consulta para guardar el usuario
    $newPersona = new Persona;
    $newPersona->username = $persona->nombre;
    $newPersona->apellido = $persona->apellido;
    $newPersona->documento = $persona->documento;
    $newPersona->tipo_documento = $persona->tipo_documento;
    $newPersona->domicilio = $persona->domicilio;
    $newPersona->telefono = $persona->telefono;
    $newPersona->celular = $persona->celular;
    $newPersona->fecha_nacimiento = $persona->fecha_nacimiento;
    $newPersona->foto = $persona->foto;
    $newPersona->localidad = $persona->localidad;
    $newPersona->provincia = $persona->provincia;
    $newPersona->codigo_postal = $persona->codigo_postal;
    $newPersona->estado_civil = $persona->estado_civil;
    $newPersona->observacion = $persona->observacion;
    if ($newPersona->insert())
    {
    echo "entra tutor";
    $newTutor = new Tutor;
    $newTutor->id_persona = $newPersona->id_persona;
    $newTutor->ocupacion = $persona->ocupacion;
    $newTutor->descripcion_ocupacion = $persona->descripcion_ocupacion;
    $newTutor->relacion = $persona->relacion;
    //Si el registro es guardado correctamente
    if (!$newTutor->insert())
    {
    $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }
    }


    //}
    }

    return $this->render('create', ['persona' => $persona,'tutor' => $tutor,]);
    }

    }*/

    /**
     * Create que funciona hecho en mi casa con el chelo

    public function actionCreate()
    {
        $tutor = new Tutor();
        $persona = new Persona();

        if ($tutor->load(Yii::$app->request->post()) && $tutor->save()) {
            return $this->redirect(['view', 'id_tutor' => $tutor->id_tutor, 'id_persona' => $tutor->id_persona]);
        } else {
            if ($persona->load(Yii::$app->request->post()))
            {
                //Preparamos la consulta para guardar el usuario
                $newPersona = new Persona();
                $newPersona->nombre = $persona->nombre;
                $newPersona->apellido = $persona->apellido;
                $newPersona->documento = $persona->documento;
                $newPersona->tipo_documento = $persona->tipo_documento;
                $newPersona->domicilio = $persona->domicilio;
                $newPersona->telefono = $persona->telefono;
                $newPersona->celular = $persona->celular;
                $newPersona->fecha_nacimiento = $persona->fecha_nacimiento;
                $newPersona->foto = $persona->foto;
                $newPersona->localidad = $persona->localidad;
                $newPersona->provincia = $persona->provincia;
                $newPersona->codigo_postal = $persona->codigo_postal;
                $newPersona->estado_civil = $persona->estado_civil;
                $newPersona->observacion = $persona->observacion;

                $newPersona->save();
                $tutor->load(Yii::$app->request->post());
                $newTutor = new Tutor();
                $newTutor->id_persona = $newPersona->id_persona;
                $newTutor->ocupacion = $tutor->ocupacion;
                $newTutor->descripcion_ocupacion = $tutor->descripcion_ocupacion;
                $newTutor->relacion = $tutor->relacion;
                $newTutor->save();
            }
            return $this->render('create', ['persona' => $persona,'tutor' => $tutor,]);
        }
    }*/

    /**
     * ultimo intento en el laburo
    */
    public function actionCreate()
    {
        $tutor = new Tutor();
        $persona = new Persona();

        if ($tutor->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post())) {
            $persona->save(); // skip validation as model is already validated
            $tutor->id_persona = Yii::$app->db->getLastInsertID();
            if($tutor->validate()){
                $tutor->save();
            }
            return $this->redirect(['view', 'id_tutor' => $tutor->id_tutor, 'id_persona' => $tutor->id_persona]);
        } else {
            return $this->render('create', ['persona' => $persona,'tutor' => $tutor,]);
        }
    }

    public function guardarImagen($foto){
        $image = $_POST['pic'];
        //Stores the filename as it was on the client computer.
        $imagename = $_FILES['pic']['name'];
        //Stores the filetype e.g image/jpeg
        $imagetype = $_FILES['pic']['type'];
        //Stores any error codes from the upload.
        $imageerror = $_FILES['pic']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $imagetemp = $_FILES['pic']['tmp_name'];

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
        }
    }
    /**
     * Updates an existing Tutor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_tutor
     * @param integer $id_persona
     * @return mixed
     */
    public function actionUpdate($id_tutor, $id_persona)
    {
        $tutor = $this->findModel($id_tutor, $id_persona);
        $persona = Persona::findOne($id_persona);

        if ($tutor->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post()) && Model::validateMultiple([$persona, $tutor]) ) {
            $persona->save();
            $foto = $persona->foto;
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
            }
            $tutor->save();
            //return $this->redirect(['view', 'id_tutor' => $tutor->id_tutor, 'id_persona' => $tutor->id_persona]);
        } else {
            return $this->render('create', ['persona' => $persona,'tutor' => $tutor,]);
        }

    }


    /**
     * Deletes an existing Tutor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_tutor
     * @param integer $id_persona
     * @return mixed
     */
    public function actionDelete($id_tutor, $id_persona)
    {
        $this->findModel($id_tutor, $id_persona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_tutor
     * @param integer $id_persona
     * @return Tutor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tutor, $id_persona)
    {
        if (($model = Tutor::findOne(['id_tutor' => $id_tutor, 'id_persona' => $id_persona])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
