<?php

namespace app\controllers;

use Yii;
use app\models\Resultados;
use app\models\ResultadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ResultadosController implements the CRUD actions for Resultados model.
 */
class ResultadosController extends Controller
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
     * Lists all Resultados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResultadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resultados model.
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
     * Creates a new Resultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resultados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_resultado]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Crea un registro en la tabla resultados y devuelve el último insertado
     * @param integer $id
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCrear($id_sesion_apartado, $id_pregunta, $id_respuesta, $correcto)
    {
            $model = new Resultados();
            $model->id_sesion_apartado = $id_sesion_apartado;
            $model->id_pregunta = $id_pregunta;
            $model->id_respuesta = $id_respuesta;
            $model->fecha= date("Y-m-d");
            //parseo el string que me devuelve $correcto a boolean que es lo que se espera en la base de datos.
            $correcto = filter_var($correcto,FILTER_VALIDATE_BOOLEAN);
            $model->correcto = $correcto;
            $model->save();

            $ultimo = Resultados::find()->orderBy(['id_resultado'=>SORT_DESC])->one();
            return Json::encode($ultimo);
    }

    /**
     * Updates an existing Resultados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_resultado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Resultados model.
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
     * Finds the Resultados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resultados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resultados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
