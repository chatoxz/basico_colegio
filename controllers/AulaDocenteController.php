<?php

namespace app\controllers;

use app\models\Docente;
use app\models\Persona;
use Yii;
use app\models\AulaDocente;
use app\models\AulaDocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AulaDocenteController implements the CRUD actions for AulaDocente model.
 */
class AulaDocenteController extends Controller
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
     * Lists all AulaDocente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AulaDocenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AulaDocente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $aula_docente = $this->findModel($id);
        $docente = Docente::findOne($aula_docente->id_docente);
        $persona = Persona::findOne($docente->id_persona);
        return $this->render('view', ['aula_docente' => $aula_docente,'persona' => $persona,'docente' => $docente,]);        
    }

    /**
     * Creates a new AulaDocente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AulaDocente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_aula_docente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AulaDocente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_aula_docente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AulaDocente model.
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
     * Finds the AulaDocente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AulaDocente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AulaDocente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
