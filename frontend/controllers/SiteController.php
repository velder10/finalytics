<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Profile;
use common\components\AccessRule;
use common\models\User;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\authclient\OAuth2;
use yii\mongodb\Query;

/**
 * Site controller
 */
class SiteController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
            	'ruleConfig' => [
            		'class' => AccessRule::className(),
            	],
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                	/* [
						'actions' => ['index'],
						'allow' => true,
						'roles' => [User::ROLE_USER_SIMPLE, User::ROLE_USER_PREMIUM, 
									User::ROLE_USER_GOLD, User::ROLE_USER_ULTIMUM, 
									User::ROLE_USER_MANAGE],
					], */
                ],
            ],
            /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], */
        ];
    }

    /**
     * @inheritdoc
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
        	'auth' => [
        		'class' => 'yii\authclient\AuthAction',
        		'successCallback' => [$this, 'oAuthSuccess'],
        	],
        ];
    }

    /**
     * This function will be triggered when user is successfuly authenticated using some oAuth client.
     *
     * @param yii\authclient\ClientInterface $client
     * @return boolean|yii\web\Response
     */
    public function oAuthSuccess($client) {
    	// get user data from client
    	$userAttributes = $client->getUserAttributes();
    	//print_r($userAttributes);
    	$profile = new Profile();
    	$profile->attributes = $userAttributes;
    	$profile->save();
    	
    	/* $user_count = User::find()->where(['username' => $userAttributes['email']])->count();
    	$user = User::findOne(['username' => $userAttributes['email']]);
    	
    	// do some thing with user data. for example with $userAttributes['email']
    	if($user_count && $user != null){
    		Yii::$app->getUser()->login($user);
    	}else{
    		$profile = new Profile();
    		$profile->attributes = $userAttributes;
    		$profile->save();
    		
    		$user = new User();
    		$user->username = $userAttributes['email'];
    		$user->email = $userAttributes['email'];
    		$user->activation_key = sha1(mt_rand(10000, 99999).time().$userAttributes['email']);
    		$user->setPassword($user->randomPassword());
    		$user->generateAuthKey();
    		$user->save() ? $user : null;
    		
    		Yii::$app->getUser()->login($user);
    	} */
    }
    
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    	$this->layout = 'main_login';
    	
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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
    	$this->layout = 'main_login';
    	
        $model = new ContactForm();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	/* Yii::$app->mailer->compose()
        	->setFrom('velder10@gmail.com')
        	->setTo('jcpoulard@gmail.com')
        	->setSubject('Message subject 10')
        	->setTextBody('Plain text content')
        	->setHtmlBody('<b>HTML content</b>')
        	->send(); */
        	//- See more at: https://arjunphp.com/send-e-mail-yii2/#sthash.E9v4Piqs.dpuf
        	/* $to = $model->email;
        	$subject = "Welcome To GhazaliTajuddin.com!";
        	$message = "Thank you for joining!, we have sent you a separate email that contains your activation link";
        	$from = "FROM: mr.ghazali@gmail.com";
        	
        	mail($to,$subject,$message,$from); */
        	
        	//$sendGrid = Yii::$app->sendGrid;
        	/* $message = $sendGrid->compose('contact/html', ['contactForm' => $form]); */
        	/* $message = $sendGrid->compose('', ['contactForm' => $model]);
        	$message->setFrom('finalytics2017@gmail.com')
        	->setTo($model->email)
        	->setSubject($model->subject)
        	->send($sendGrid); */
        	
            /* if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            } */

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
    public function actionAbout()
    {
    	$this->layout = 'main_login';
    	
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
    	$this->layout = 'main_login';
    	
        $model = new SignupForm();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
    	$this->layout = 'main_login';
    	 
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
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
    public function actionResetPassword($token)
    {
    	$this->layout = 'main_login';
    	
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
