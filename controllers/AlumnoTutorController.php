<?php

namespace app\controllers;

use Yii;
use app\models\AlumnoTutor;
use app\models\AlumnoTutorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlumnoTutorController implements the CRUD actions for AlumnoTutor model.
 */
class AlumnoTutorController extends Controller
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
     * Lists all AlumnoTutor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoTutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlumnoTutor model.
     * @param integer $id_alumno_tutor
     * @param integer $id_alumno
     * @param integer $id_tutor
     * @return mixed
     */
    public function actionView($id_alumno_tutor, $id_alumno, $id_tutor)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alumno_tutor, $id_alumno, $id_tutor),
        ]);
    }

    /**
     * Creates a new AlumnoTutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlumnoTutor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alumno_tutor' => $model->id_alumno_tutor, 'id_alumno' => $model->id_alumno, 'id_tutor' => $model->id_tutor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlumnoTutor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_alumno_tutor
     * @param integer $id_alumno
     * @param integer $id_tutor
     * @return mixed
     */
    public function actionUpdate($id_alumno_tutor, $id_alumno, $id_tutor)
    {
        $model = $this->findModel($id_alumno_tutor, $id_alumno, $id_tutor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_alumno_tutor' => $model->id_alumno_tutor, 'id_alumno' => $model->id_alumno, 'id_tutor' => $model->id_tutor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlumnoTutor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_alumno_tutor
     * @param integer $id_alumno
     * @param integer $id_tutor
     * @return mixed
     */
    public function actionDelete($id_alumno_tutor, $id_alumno, $id_tutor)
    {
        $this->findModel($id_alumno_tutor, $id_alumno, $id_tutor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlumnoTutor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_alumno_tutor
     * @param integer $id_alumno
     * @param integer $id_tutor
     * @return AlumnoTutor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alumno_tutor, $id_alumno, $id_tutor)
    {
        if (($model = AlumnoTutor::findOne(['id_alumno_tutor' => $id_alumno_tutor, 'id_alumno' => $id_alumno, 'id_tutor' => $id_tutor])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
