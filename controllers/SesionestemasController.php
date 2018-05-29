<?php

namespace app\controllers;

use app\models\SesionesTemas;
use app\models\SesionesTemasSearch;
use app\models\Temas;
use app\models\Sesiones;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SesionestemasController implements the CRUD actions for SesionesTemas model.
 */
class SesionestemasController extends Controller
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
     * Lists all SesionesTemas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SesionesTemasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Todos los temas del idioma elegido.
     * @return mixed
     * @param mixed $id_idioma
     * @param mixed $id_sesion
     */
    public function actionMuestratemas($id_sesion)
    {
        $model = new SesionesTemas();
        $idioma = Sesiones::findOne(['id_sesion' => $id_sesion])->id_idioma;
        $temas = Temas::findAll(['id_idioma' => $idioma]);
        $sesionesTemas = SesionesTemas::findAll(['id_sesion' => $id_sesion]);
        //var_dump($temasPendientes); die();

        return $this->render('muestraTemas', [
            'temas' => $temas,
            'model' => $model,
            'sesionesTemas' => $sesionesTemas,
        ]);
    }

    /**
     * Displays a single SesionesTemas model.
     * @param int $id
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
     * Creates a new SesionesTemas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SesionesTemas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesion_tema]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SesionesTemas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesion_tema]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SesionesTemas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SesionesTemas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return SesionesTemas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SesionesTemas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
