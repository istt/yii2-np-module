<?php

namespace istt\np\controllers;

use Yii;
use istt\np\models\NetworkCode;
use istt\np\models\NetworkCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NetworkCodeController implements the CRUD actions for NetworkCode model.
 */
class NetworkCodeController extends Controller
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
     * Lists all NetworkCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NetworkCodeSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexNetworkCode', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single NetworkCode model.
     * @param integer $operator_id
     * @param string $mnc
     * @return mixed
     */
    public function actionView($operator_id, $mnc)
    {
        return $this->render('viewNetworkCode', [
            'model' => $this->findModel($operator_id, $mnc),
        ]);
    }

    /**
     * Creates a new NetworkCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NetworkCode;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'operator_id' => $model->operator_id, 'mnc' => $model->mnc]);
        } else {
            return $this->render('createNetworkCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NetworkCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $operator_id
     * @param string $mnc
     * @return mixed
     */
    public function actionUpdate($operator_id, $mnc)
    {
        $model = $this->findModel($operator_id, $mnc);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'operator_id' => $model->operator_id, 'mnc' => $model->mnc]);
        } else {
            return $this->render('updateNetworkCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NetworkCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $operator_id
     * @param string $mnc
     * @return mixed
     */
    public function actionDelete($operator_id, $mnc)
    {
        $this->findModel($operator_id, $mnc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NetworkCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $operator_id
     * @param string $mnc
     * @return NetworkCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($operator_id, $mnc)
    {
        if (($model = NetworkCode::findOne(['operator_id' => $operator_id, 'mnc' => $mnc])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
