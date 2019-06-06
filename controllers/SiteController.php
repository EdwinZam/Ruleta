<?php

namespace app\controllers;

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
//New add
use yii\web\Response;
use app\models\User;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
//use mPDF;
//End add
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\RegistroForm;
use app\models\ContactForm;
use app\models\UserPasswordChange;

date_default_timezone_set('America/Bogota');

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        //Aqui se agregan los stios que tendran restricción de acceso
        $only = ['logout', 'registro', 'iniciativas', 'cruds', 'create', 'update', 'passchange'];
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => $only,
                'rules' => [
                    [
                        'actions' => ['registro'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = [User::ROL_SUPERUSER];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['iniciativas', 'cruds', 'create', 'update', 'passchange'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = [User::ROL_USER, User::ROL_ADMINISTRADOR, User::ROL_SUPERUSER, User::ROL_FUNCIONARIO];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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
     * @return mixed
     */
    public function actionIndex() {
        /**
         * Linea original
         * return $this->render('index');
         */
        if (!Yii::$app->user->isGuest) {
            $sqlwcm = 'select roles.rol from roles, user where roles.id_rol = user.id_rol and user.email = "' . Yii::$app->user->identity->email . '";';

            //$rutaUsuario = Yii::$app->user->identity->id_rol;
            $rutaUsuario = Yii::$app->db->createCommand($sqlwcm)->queryScalar();
            return $this->render($rutaUsuario . '/index');
            //return $this->render('administrador/index');
        } else
            return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Gracias por contactarnos. Responderemos a la mayor brevedad posible.');
            } else {
                Yii::$app->session->setFlash('error', 'Se ha producido un error al enviar el mensaje.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegistro() {
        $model = new RegistroForm();
        $msgreg = null;
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->registro()) {
                $msgreg = 'Usuario registrado correctamente';
                return $this->render('registro', ['model' => $model, 'msgreg' => $msgreg]);
                //return $this->refresh(); ---
            }
        }

        return $this->render('registro', [
                    'model' => $model,
                    'msgreg' => $msgreg,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Revise su correo electrónico para obtener más instrucciones.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Lo sentimos, no podemos restablecer la contraseña para la dirección de correo electrónico proporcionada.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password Change.
     *
     * @return mixed
     */
    public function actionPasschange() {
        //2da verificacion que no sea visitante
        if (!Yii::$app->user->isGuest) {
            $model = new UserPasswordChange();
            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
                Yii::$app->session->setFlash('success', 'New password Changed.');

                return $this->goHome();
            }


            return $this->render('passchange', [
                        'model' => $model
            ]);
        }
    }

}
