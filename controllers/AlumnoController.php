<?php

namespace app\controllers;

use Yii;
use app\models\Alumno;
use app\models\AlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */
class AlumnoController extends Controller
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
        return $this->render('view', [
            'model' => $this->findModel($id_alumno, $id_persona),
        ]);
    }

    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alumno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alumno' => $model->id_alumno, 'id_persona' => $model->id_persona]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
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
        $model = $this->findModel($id_alumno, $id_persona);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alumno' => $model->id_alumno, 'id_persona' => $model->id_persona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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