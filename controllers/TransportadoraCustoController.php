<?php

namespace app\controllers;

use Yii;
use app\models\TransportadoraCusto;
use app\models\TransportadoraCustoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransportadoraCustoController implements the CRUD actions for TransportadoraCusto model.
 */
class TransportadoraCustoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TransportadoraCusto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransportadoraCustoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransportadoraCusto model.
     * @param integer $id
     * @param integer $transportadora_id
     * @return mixed
     */
    public function actionView($id, $transportadora_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $transportadora_id),
        ]);
    }

    /**
     * Creates a new TransportadoraCusto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransportadoraCusto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'transportadora_id' => $model->transportadora_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TransportadoraCusto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $transportadora_id
     * @return mixed
     */
    public function actionUpdate($id, $transportadora_id)
    {
        $model = $this->findModel($id, $transportadora_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'transportadora_id' => $model->transportadora_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TransportadoraCusto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $transportadora_id
     * @return mixed
     */
    public function actionDelete($id, $transportadora_id)
    {
        $this->findModel($id, $transportadora_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransportadoraCusto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $transportadora_id
     * @return TransportadoraCusto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $transportadora_id)
    {
        if (($model = TransportadoraCusto::findOne(['id' => $id, 'transportadora_id' => $transportadora_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
