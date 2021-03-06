<?php

namespace app\controllers;

use Yii;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FormRegister;
use app\models\Users;
use app\models\Usuarios;
use app\models\Idiomas;
use app\models\User;
use app\models\UsuariosSesiones;
use app\models\Sesiones;
?>

<?php
class SiteController extends Controller
{



    private function randKey($str = '', $long = 0)
      {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }

 public function actionConfirm()
 {
    $table = new Users;
    if (Yii::$app->request->get())
    {

        //Obtenemos el valor de los parámetros get
        $id = Html::encode($_GET["id"]);
        $authKey = $_GET["authkey"];

        if ((int) $id)
        {
            //Realizamos la consulta para obtener el registro
            $model = $table
            ->find()
            ->where("id=:id", [":id" => $id])
            ->andWhere("authkey=:authkey", [":authkey" => $authKey]);

            //Si el registro existe
            if ($model->count() == 1)
            {
                $activar = Users::findOne($id);
                $activar->activate = 1;
                if ($activar->update())
                {
                    echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
             }
            else //Si no existe redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        }
        else //Si id no es un número entero redireccionamos a login
        {
            return $this->redirect(["site/login"]);
        }
    }
 }

 public function actionRegister()
 {
  //Creamos la instancia con el model de validación
  $model = new FormRegister;

  //Mostrará un mensaje en la vista cuando el usuario se haya registrado
  $msg = null;

  //Validación mediante ajax
  if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

  //Validación cuando el formulario es enviado vía post
  //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
  //También previene por si el usuario tiene desactivado javascript y la
  //validación mediante ajax no puede ser llevada a cabo
  if ($model->load(Yii::$app->request->post()))
  {
   if($model->validate())
   {
    //Preparamos la consulta para guardar el usuario
    $table = new Users;
    $table->username = $model->username;
    $table->email = $model->email;
    //Encriptamos el password
    $table->password = crypt($model->password, Yii::$app->params["salt"]);
    //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
    //clave será utilizada para activar el usuario
    $table-> authkey = $this->randKey('abcdef0123456789', 200);
    //Creamos un token de acceso único para el usuario
    $table-> accesstoken = $this->randKey("abcdef0123456789", 200);

    //Si el registro es guardado correctamente
    if ($table->insert())
    {
     //Nueva consulta para obtener el id del usuario
     //Para confirmar al usuario se requiere su id y su authKey
     $user = $table->find()->where(["email" => $model->email])->one();
     $id = urlencode($user->id);
     $authKey = urlencode($user->authkey);

     $subject = "Confirmar registro";
     $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
     $body .= "<a href='/index.php?r=site/confirm&id=".$id."&authkey=".$authKey."'>Confirmar</a>";

     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($user->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();

     $model->username = null;
     $model->email = null;
     $model->password = null;
     $model->password_repeat = null;


     $msg = '<div class="alert alert-success">Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo</div>';
    }
    else
    {
     $msg = '<div class="alert alert-danger">Ha ocurrido un error al llevar a cabo tu registro</div>';
    }

   }
   else
   {
    $model->getErrors();
   }
  }
  return $this->render("register", ["model" => $model, "msg" => $msg]);
 }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $idiomas= Idiomas::find()->all();
        $logueado= Yii::$app->user->isGuest;
        $haySesiones = Sesiones::findAll(['id_usuario' => Yii::$app->user->getId()]);

        foreach ($idiomas as $key) {
            $htmlStr[] = '<section class="col-xs-6 col-md-2 col-bg-2 descIdioma" itemscope itemtype="http://schema.org/Language" id="idioma' . $key->id_idioma . '">
                <div class="col-xs-12">
                <script type="text/javascript" >';
            if (!$logueado) {
                $htmlStr[] = 'document.getElementById("idioma' . $key->id_idioma . '").onclick = function(){location.assign("/index.php?r=sesiones/existesesion&id_idioma=' . $key->id_idioma . '");}';
            } else {
                $htmlStr[] = 'document.getElementById("idioma' . $key->id_idioma . '").onclick = function(){location.assign("/index.php?r=site/login");}';
            };
            $htmlStr[] = '</script>
                    <figure>
                        <img id="' . $key->descripcion . '" class="banderas" itemprop="image" src="' . $key->icono . '" title="' . $key->descripcion . '" />
                    </figure>
                </div>
                <div class="col-xs-12 descIdioma">
                    <p itemprop="name">' . $key->descripcion . '</p>
                </div>
            </section>';
        }

        $htmlResult = implode($htmlStr);

        return $this->render('index', [
            'banderas' => $htmlResult,
            'logueado' => $logueado,
            'haySesiones' => $haySesiones,
            'idiomas'=> $idiomas,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $idUser = Yii::$app->user->getId();
            $user = User::isUser($idUser);

            $sesionesUsuario= Sesiones::findOne(['id_usuario' => $idUser]);
            //var_dump($sesionesUsuario); die();
            if ($user && $sesionesUsuario != null) {
                $this->redirect(['/sesiones/indsesionesusuario']);
            } else {
                return $this->goHome();
            }

        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $htmlStr[]= '<div class="jumbotron"></div>' .
        '<section">' .
            '<h4>AprendeMas</h4>' .
            '<p>Es una página web que ofrece cursos de diferentes idiomas a sus usuarios.
                </br>Los alumnos pueden registrase de forma gratuita.
                </br>Es una manera de aprender nuevos idiomas donde y cuando quieras.
            </p>' .
            '<button class="btn btn-lg btn-success boton-sombra" id="empezar">Empieza ahora</button>' .
        '</section>';

        $htmlResult = implode($htmlStr);


            return $this->render('about', [
                'info' => $htmlResult,
            ]);
    }
}
