<?php

namespace istt\np\controllers;

use Yii;
use istt\np\models\MobileCountryCode;
use istt\np\models\MobileCountryCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MobileCountryCodeController implements the CRUD actions for MobileCountryCode model.
 */
class MobileCountryCodeController extends Controller
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
     * Lists all MobileCountryCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MobileCountryCodeSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('indexMobileCountryCode', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single MobileCountryCode model.
     * @param integer $country_id
     * @param string $mcc
     * @return mixed
     */
    public function actionView($country_id, $mcc)
    {
        return $this->render('viewMobileCountryCode', [
            'model' => $this->findModel($country_id, $mcc),
        ]);
    }

    /**
     * Creates a new MobileCountryCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MobileCountryCode;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'country_id' => $model->country_id, 'mcc' => $model->mcc]);
        } else {
            return $this->render('createMobileCountryCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MobileCountryCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $country_id
     * @param string $mcc
     * @return mixed
     */
    public function actionUpdate($country_id, $mcc)
    {
        $model = $this->findModel($country_id, $mcc);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'country_id' => $model->country_id, 'mcc' => $model->mcc]);
        } else {
            return $this->render('updateMobileCountryCode', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MobileCountryCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $country_id
     * @param string $mcc
     * @return mixed
     */
    public function actionDelete($country_id, $mcc)
    {
        $this->findModel($country_id, $mcc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MobileCountryCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $country_id
     * @param string $mcc
     * @return MobileCountryCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($country_id, $mcc)
    {
        if (($model = MobileCountryCode::find(['country_id' => $country_id, 'mcc' => $mcc])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
