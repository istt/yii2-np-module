<?php

namespace istt\np\controllers;

use Yii;
use istt\np\models\CountryCode;
use istt\np\models\CountryCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryCodeController implements the CRUD actions for CountryCode model.
 */
class CountryCodeController extends Controller
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
     * Lists all CountryCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountryCodeSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexCountryCode', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single CountryCode model.
     * @param integer $country_id
     * @param string $cc
     * @return mixed
     */
    public function actionView($country_id, $cc)
    {
        return $this->render('viewCountryCode', [
            'model' => $this->findModel($country_id, $cc),
        ]);
    }

    /**
     * Creates a new CountryCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountryCode;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'country_id' => $model->country_id, 'cc' => $model->cc]);
        } else {
            return $this->render('createCountryCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CountryCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $country_id
     * @param string $cc
     * @return mixed
     */
    public function actionUpdate($country_id, $cc)
    {
        $model = $this->findModel($country_id, $cc);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'country_id' => $model->country_id, 'cc' => $model->cc]);
        } else {
            return $this->render('updateCountryCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CountryCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $country_id
     * @param string $cc
     * @return mixed
     */
    public function actionDelete($country_id, $cc)
    {
        $this->findModel($country_id, $cc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CountryCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $country_id
     * @param string $cc
     * @return CountryCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($country_id, $cc)
    {
        if (($model = CountryCode::findOne(['country_id' => $country_id, 'cc' => $cc])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
