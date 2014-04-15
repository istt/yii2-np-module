<?php

namespace istt\np\controllers;

use Yii;
use istt\np\models\NetworkDestinationCode;
use istt\np\models\NetworkDestinationCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NetworkDestinationCodeController implements the CRUD actions for NetworkDestinationCode model.
 */
class NetworkDestinationCodeController extends Controller
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
     * Lists all NetworkDestinationCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NetworkDestinationCodeSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexNetworkDestinationCode', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single NetworkDestinationCode model.
     * @param integer $operator_id
     * @param string $ndc
     * @return mixed
     */
    public function actionView($operator_id, $ndc)
    {
        return $this->render('viewNetworkDestinationCode', [
            'model' => $this->findModel($operator_id, $ndc),
        ]);
    }

    /**
     * Creates a new NetworkDestinationCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NetworkDestinationCode;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'operator_id' => $model->operator_id, 'ndc' => $model->ndc]);
        } else {
            return $this->render('createNetworkDestinationCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NetworkDestinationCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $operator_id
     * @param string $ndc
     * @return mixed
     */
    public function actionUpdate($operator_id, $ndc)
    {
        $model = $this->findModel($operator_id, $ndc);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'operator_id' => $model->operator_id, 'ndc' => $model->ndc]);
        } else {
            return $this->render('updateNetworkDestinationCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NetworkDestinationCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $operator_id
     * @param string $ndc
     * @return mixed
     */
    public function actionDelete($operator_id, $ndc)
    {
        $this->findModel($operator_id, $ndc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NetworkDestinationCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $operator_id
     * @param string $ndc
     * @return NetworkDestinationCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($operator_id, $ndc)
    {
        if (($model = NetworkDestinationCode::find(['operator_id' => $operator_id, 'ndc' => $ndc])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
