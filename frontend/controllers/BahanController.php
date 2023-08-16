<?php

namespace frontend\controllers;

use common\models\bahan;
use frontend\models\BahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BahanController implements the CRUD actions for bahan model.
 */
class BahanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all bahan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BahanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single bahan model.
     * @param int $id_bahan Id Bahan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_bahan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_bahan),
        ]);
    }

    /**
     * Creates a new bahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new bahan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_bahan' => $model->id_bahan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing bahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_bahan Id Bahan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_bahan)
    {
        $model = $this->findModel($id_bahan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_bahan' => $model->id_bahan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing bahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_bahan Id Bahan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_bahan)
    {
        $this->findModel($id_bahan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the bahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_bahan Id Bahan
     * @return bahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_bahan)
    {
        if (($model = bahan::findOne(['id_bahan' => $id_bahan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
