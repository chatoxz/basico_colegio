<?php

namespace app\controllers;

use Yii;
use app\models\TipoAlumno;
use app\models\TipoAlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoAlumnoController implements the CRUD actions for TipoAlumno model.
 */
class TipoAlumnoController extends Controller
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
     * Lists all TipoAlumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoAlumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoAlumno model.
     * @param integer $id_tipo_alumno
     * @param integer $id_alumno
     * @return mixed
     */
    public function actionView($id_tipo_alumno, $id_alumno)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tipo_alumno, $id_alumno),
        ]);
    }

    /**
     * Creates a new TipoAlumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoAlumno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipo_alumno' => $model->id_tipo_alumno, 'id_alumno' => $model->id_alumno]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TipoAlumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_tipo_alumno
     * @param integer $id_alumno
     * @return mixed
     */
    public function actionUpdate($id_tipo_alumno, $id_alumno)
    {
        $model = $this->findModel($id_tipo_alumno, $id_alumno);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipo_alumno' => $model->id_tipo_alumno, 'id_alumno' => $model->id_alumno]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TipoAlumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_tipo_alumno
     * @param integer $id_alumno
     * @return mixed
     */
    public function actionDelete($id_tipo_alumno, $id_alumno)
    {
        $this->findModel($id_tipo_alumno, $id_alumno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoAlumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_tipo_alumno
     * @param integer $id_alumno
     * @return TipoAlumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tipo_alumno, $id_alumno)
    {
        if (($model = TipoAlumno::findOne(['id_tipo_alumno' => $id_tipo_alumno, 'id_alumno' => $id_alumno])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
