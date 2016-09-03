<?php

namespace app\controllers;

use app\models\Aula;
use app\models\ObraSocial;
use app\models\Persona;
use app\models\User;
use Yii;
use app\models\Alumno;
use app\models\AlumnoSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */
class AlumnoController extends Controller
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
     * Lists all Alumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumno model.
     * @param integer $id_alumno
     * @param integer $id_persona
     * @return mixed
     */
    public function actionView($id_alumno, $id_persona)
    {
        $alumno = $this->findModel($id_alumno, $id_persona);
        $persona = Persona::findOne($id_persona);
        return $this->render('view', ['persona' => $persona,'alumno' => $alumno,]);
    }

    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $alumno = new Alumno();
        $persona = new Persona();
        $items = ArrayHelper::map(Aula::find()->all(), 'id_aula','nombre');
        $os =  ArrayHelper::map(ObraSocial::find()->all(), 'id_obra_social','nombre');

        if ($alumno->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post())) {
            echo 'hola';
            $persona->save(); // skip validation as model is already validated
            $alumno->id_persona = Yii::$app->db->getLastInsertID();
            if($alumno->validate()){
                echo $alumno->id_persona;
                $alumno->save();
            }
            return $this->redirect(['view', 'id_alumno' => $alumno->id_alumno, 'id_persona' => $alumno->id_persona,]);
        } else {
            return $this->render('create', ['persona' => $persona,'alumno' => $alumno, 'items'=>$items, 'os' =>$os]);
        }

    }

    /**
     * Updates an existing Alumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_alumno
     * @param integer $id_persona
     * @return mixed
     */
    public function actionUpdate($id_alumno, $id_persona)
    {
        $alumno = $this->findModel($id_alumno, $id_persona);
        $persona = Persona::findOne($id_persona);
        $items = ArrayHelper::map(Aula::find()->all(), 'id_aula','nombre');
        $os =  ArrayHelper::map(ObraSocial::find()->all(), 'id_obra_social','nombre');

        if ($alumno->load(Yii::$app->request->post()) && $persona->load(Yii::$app->request->post()) && Model::validateMultiple([$persona, $alumno])) {
            $persona->save(); // skip validation as model is already validated
            $alumno->save();
            return $this->redirect(['view', 'id_alumno' => $alumno->id_alumno, 'id_persona' => $alumno->id_persona]);
        } else {
            return $this->render('update', ['persona' => $persona,'alumno' => $alumno, 'items'=>$items, 'os' =>$os]);
        }
    }

    /**
     * Deletes an existing Alumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_alumno
     * @param integer $id_persona
     * @return mixed
     */
    public function actionDelete($id_alumno, $id_persona)
    {
        $this->findModel($id_alumno, $id_persona)->delete();
        $persona = Persona::findOne($id_persona);
        $persona->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_alumno
     * @param integer $id_persona
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alumno, $id_persona)
    {
        if (($model = Alumno::findOne(['id_alumno' => $id_alumno, 'id_persona' => $id_persona])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
