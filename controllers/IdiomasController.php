<?php

namespace app\controllers;

use Yii;
use app\models\Idiomas;
use app\models\IdiomasSearch;
use app\models\Sesiones;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * IdiomasController implements the CRUD actions for Idiomas model.
 */
class IdiomasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return[
            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create','update','delete'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']  //no deja crear, actualizar o borrar un idioma a usuarios no logueados
                    ],
                ]
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Idiomas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdiomasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $idUser = Yii::$app->user->getId();
        //var_dump($idUser); die();
        $idiomas = Sesiones::findAll(['id_usuario'=>$idUser, 'fin'=>false]);
        $arraySesiones = [];
        foreach ($idiomas as $idioma) {
            $arraySesiones[] = [$idioma->username, $idioma->descripcionIdioma, $idioma->icono];
        }
        //var_dump($idiomas); die();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'array' => $arraySesiones
        ]);
    }

    /**
     * Displays a single Idiomas model.
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
     * Creates a new Idiomas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Idiomas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_idioma]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Idiomas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_idioma]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Idiomas model.
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
     * Finds the Idiomas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Idiomas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Idiomas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
