<?php

namespace app\controllers;

use app\models\Sesiones;
use app\models\SesionesSearch;
use app\models\SesionesTemas;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SesionesController implements the CRUD actions for Sesiones model.
 */
class SesionesController extends Controller
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
     * Lists all Sesiones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SesionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Sesiones model.
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
     * Todas las sesiones del usuario logueado.
     * @return mixed
     */
    public function actionIndsesionesusuario()
    {
        $idUser = Yii::$app->user->getId();
        $sesiones = Sesiones::findAll(['id_usuario' => $idUser]);
        //var_dump($sesiones); die();


        return $this->render('sesionesUsuario', [
            'arraySesiones' => $sesiones,
            //'sesionesTemas' => $sesionesTemas,
        ]);
    }

    /**
     * Comprobar si esa sesión ya existe
     * @return mixed
     */
    public function actionExistesesion($id_idioma)
    {
        $sesion = Sesiones::findOne(['id_idioma' => $id_idioma, 'id_usuario'=>Yii::$app->user->id]);
            if ($sesion != null) {
                $id_sesion = $sesion->id_sesion;
                $this->redirect(['temas/muestratemas', 'id_sesion'=>$id_sesion]);
            }else {
                //crear una nueva sesion//
                $nuevaSesion = new Sesiones();
                $nuevaSesion->id_usuario = Yii::$app->user->id;
                $nuevaSesion->id_idioma = $id_idioma;
                $nuevaSesion->fin = false;
                $nuevaSesion->fecha= date("Y-m-d");
                $nuevaSesion->save();
                $this->redirect(['temas/muestratemas', 'id_sesion'=>$nuevaSesion->id_sesion]);
            }
    }

    /**
     * Creates a new Sesiones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sesiones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sesiones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sesiones model.
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
     * Finds the Sesiones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Sesiones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sesiones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
