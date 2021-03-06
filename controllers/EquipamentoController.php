<?php

namespace app\controllers;

use Yii;
use app\models\EQUIPAMENTO;
use app\models\equipamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquipamentoController implements the CRUD actions for EQUIPAMENTO model.
 */
class EquipamentoController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all EQUIPAMENTO models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new equipamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EQUIPAMENTO model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EQUIPAMENTO model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EQUIPAMENTO();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->EQUIPAMENTO_COD_PK]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EQUIPAMENTO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $equipamento = EQUIPAMENTO::findOne($id);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           

            /** */
        if($model->LOCAL_COD_FK == $equipamento->LOCAL_COD_FK)
        {
            //Yii::$app->session->setFlash('info' , "<b>Igual!<br>$equipamento->LOCAL_COD_FK -> $model->LOCAL_COD_FK</b>");
        }else{

            //Yii::$app->session->setFlash('info' , "<b>Diferente!<br>$equipamento->LOCAL_COD_FK -> $model->LOCAL_COD_FK</b>");
            $model->EQUIPAMENTO_HISTORICO_LOCAL .=  $equipamento->LOCAL_COD_FK.';'.date('d/m/Y').';';
            $model->save();

        }
        /** */
            //return $this->redirect(['view', 'id' => $model->EQUIPAMENTO_COD_PK]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EQUIPAMENTO model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EQUIPAMENTO model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EQUIPAMENTO the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EQUIPAMENTO::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
