<?php

namespace app\controllers;

use Yii;
use app\models\Cobro;
use app\models\CobroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CobroController implements the CRUD actions for Cobro model.
 */
class CobroController extends Controller
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
     * Lists all Cobro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CobroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cobro model.
     * @param integer $id_cobro
     * @param integer $id_alumno
     * @param integer $id_factura
     * @return mixed
     */
    public function actionView($id_cobro, $id_alumno, $id_factura)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_cobro, $id_alumno, $id_factura),
        ]);
    }

    /**
     * Creates a new Cobro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cobro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_cobro' => $model->id_cobro, 'id_alumno' => $model->id_alumno, 'id_factura' => $model->id_factura]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cobro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_cobro
     * @param integer $id_alumno
     * @param integer $id_factura
     * @return mixed
     */
    public function actionUpdate($id_cobro, $id_alumno, $id_factura)
    {
        $model = $this->findModel($id_cobro, $id_alumno, $id_factura);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_cobro' => $model->id_cobro, 'id_alumno' => $model->id_alumno, 'id_factura' => $model->id_factura]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cobro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_cobro
     * @param integer $id_alumno
     * @param integer $id_factura
     * @return mixed
     */
    public function actionDelete($id_cobro, $id_alumno, $id_factura)
    {
        $this->findModel($id_cobro, $id_alumno, $id_factura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cobro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_cobro
     * @param integer $id_alumno
     * @param integer $id_factura
     * @return Cobro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_cobro, $id_alumno, $id_factura)
    {
        if (($model = Cobro::findOne(['id_cobro' => $id_cobro, 'id_alumno' => $id_alumno, 'id_factura' => $id_factura])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
