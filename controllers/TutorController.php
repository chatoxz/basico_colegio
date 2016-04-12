<?php

namespace app\controllers;

use Yii;
use app\models\Tutor;
use app\models\TutorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return $this->render('view', [
            'model' => $this->findModel($id_tutor, $id_persona),
        ]);
    }

    /**
     * Creates a new Tutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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
        $model = $this->findModel($id_tutor, $id_persona);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tutor' => $model->id_tutor, 'id_persona' => $model->id_persona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
