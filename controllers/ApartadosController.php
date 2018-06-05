<?php

namespace app\controllers;

use Yii;
use app\models\Apartados;
use app\models\Temas;
use app\models\Idiomas;
use app\models\ApartadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApartadosController implements the CRUD actions for Apartados model.
 */
class ApartadosController extends Controller
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
     * Lists all Apartados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApartadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apartados model.
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
     * Mostrar los apartados de los temas.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionApartado($id)
    {
        $id_tema = Apartados::findOne(['id_apartado' => $id])->id_tema;
        $id_idioma = Temas::findOne(['id_tema'=>$id_tema])->id_idioma;
        $temas = Temas::findAll(['id_idioma' => $id_idioma]);
        $apartado = Apartados::findOne(['id_apartado' => $id]);
        $idioma = Idiomas::findOne(['id_idioma' => $id_idioma]);

        $htmlApartado[]=
        '<p>' . $apartado->titulo . '</p>' .
        '<p>' . $apartado->contenido . '</p>';

        $htmlTemas[] = '<h3>' . $idioma->descripcion . '</h3>';

        foreach ($temas as $tema) {
            $apartados = $tema->apartados;
            $htmlTemas[] = '<div class="col-sm-12">' .
                '<ul>
                    <li data-toggle="collapse" data-target=".demo' .  $tema->id_tema . '">' .  $tema->titulo . '</li>' .
                    '<div class="col-xs-12 collapse demo' .  $tema->id_tema . '">';
                '</ul>';
                foreach ($apartados as $apartado) {
                         $htmlInterm[] = '<p><a class= "apartado" id="' .  $apartado->id_apartado . '" href="/index.php?r=apartados/apartado&id=' .  $apartado->id_apartado . '">'
                          . $apartado->titulo . '</a></p>';
                }
            $htmlTemas[] =implode($htmlInterm) . '</div></div>';
            $htmlInterm = [];
        };


        $htmlTemas = implode($htmlTemas);
        $htmlApartado = implode($htmlApartado);
        return $this->render('muestraApartado', [
            'htmlApartado' => $htmlApartado,
            'htmlTemas' => $htmlTemas,
            'apartado' => $apartado,

        ]);
    }

    /**
     * Mostrar el test.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionTest($id)
    {
        $id_tema = Apartados::findOne(['id_apartado' => $id])->id_tema;
        $id_idioma = Temas::findOne(['id_tema'=>$id_tema])->id_idioma;
        $temas = Temas::findAll(['id_idioma' => $id_idioma]);
        $apartado = Apartados::findOne(['id_apartado' => $id]);
        $idioma = Idiomas::findOne(['id_idioma' => $id_idioma]);
        //var_dump($apartado->preguntas); die();


        return $this->render('muestraTest', [
            'apartado' => $apartado,

        ]);
    }

    /**
     * Creates a new Apartados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apartados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_apartado]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Apartados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_apartado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Apartados model.
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
     * Finds the Apartados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
