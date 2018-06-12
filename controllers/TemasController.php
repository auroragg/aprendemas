<?php

namespace app\controllers;

use Yii;
use app\models\Temas;
use app\models\Sesiones;
use app\models\SesionesApartados;
use app\models\TemasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TemasController implements the CRUD actions for Temas model.
 */
class TemasController extends Controller
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
     * Todos los temas del idioma elegido.
     * @return mixed
     * @param mixed $id_idioma
     * @param mixed $id_sesion
     */
    public function actionMuestratemas($id_sesion)
    {
        $model = new Temas();
        $idioma = Sesiones::findOne(['id_sesion' => $id_sesion])->id_idioma;
        $icono = Sesiones::findOne(['id_sesion' =>$id_sesion])->icono;
        //var_dump($icono); die();
        $temas = Temas::findAll(['id_idioma' => $idioma]);

        foreach ($temas as $tema) {
            $apartados = $tema->apartados;
            $clase ="temaBoxInactivo";
            foreach ($apartados as $key) {
                /*$sesApart = $key->sesionesApartados;*/
                $sesApart = SesionesApartados::findOne(['id_apartado' => $key->id_apartado, 'id_sesion' => $id_sesion]);
                if ($sesApart != null) {
                    $clase = "temaBox";
                    break;
                }
            }


            $htmlStr[] = '<section class="col-sm-3 ' . $clase . '">' .
                '<p>' .  $tema->titulo . '</p>' .
                '<p class="descripcion_tema">' .  $tema->descripcion . '</p>' .
                '<button type="button" class="btn btn-info col-xs-12" id="btn-apart" data-toggle="collapse"' .
                        'data-target=".demo' .  $tema->id_tema . '">Ver Apartados    <span class="glyphicon glyphicon-collapse-down"></button>' .
                        '<div class="col-xs-12 collapse demo' .  $tema->id_tema . '">';
                foreach ($apartados as $apartado) {
                         $htmlInterm[] = '<p><a href="/index.php?r=apartados/apartado&id=' .  $apartado->id_apartado . '&id_sesion=' . $id_sesion .'">'
                          . $apartado->titulo . '</a></p>';
                }
            $htmlStr[] =implode($htmlInterm) . '</div></section>';
            $htmlInterm = [];
        };

        //var_dump($temasPendientes); die();
        $htmlStr = implode($htmlStr);
        return $this->render('muestraTemas', [
            'icono'=> $icono,
            'temas' => $temas,
            'model' => $model,
            'htmlStr' => $htmlStr,
            //'sesionesTemas' => $sesionesTemas,
        ]);
    }

    /**
     * Lists all Temas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TemasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Temas model.
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
     * Creates a new Temas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Temas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tema]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Temas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tema]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Temas model.
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
     * Finds the Temas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Temas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Temas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
