<?php


class SiteController extends Controller
{
	public $layout = "//layouts/main";
	//public $layout = "//layouts/site"; //defino que layout quiero que arranque

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'foreColor'=>0xCB2C0A

			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/** O SEA REDIRECCIONA EN CASO DE NO SOLICITAR ACCION
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//mio, como mostrarlo
		$model = "Hola Mundo!!";
		//$this->render('index', array('model'=>$model));
		//LE PUEDO DARL EL NOMBRE QUE QUIERA A LA VAR Q MANDO
		//$this->render('index', array('otro'=>$model));


		//manejo de array
		$array = array("mi array", 1, 2, 3, 4, 5);
		
		$this->render('index', 
			array(
				'model' => $model,
				"miArray" => $array,
			));

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
	
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	/** Nueva accion para mi propia vista
	 * 
	*/
	public function actionPruebaVista(){
		 
		$this->render('pruebavista');

	}

	/** Nueva accion para la vista registo
	 * 
	*/
	public function actionRegistro()
	{
		
		//creo el modelo para el registro
		$model = new ValidarRegistro;			
		$model->sexo = 1;
		$mensaje = '';

		//valida la exisencia del email
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		//valido si el formulario fue enviado (post)
		if(isset($_POST["ValidarRegistro"])){
			
			//obtengo el atributo con la propiedad attributes
			$model->attributes = $_POST["ValidarRegistro"];

			//verifico si pasa el filtro
			if(!$model->validate()){

				//en caso de error redirecciono enviado
				$this->redirect($this->createUrl('site/registro'));
			}
			else{

				/**Us de la BD */
				$consulta = new ConsultasBD;
				
				$consulta->guardar_usuario(
								$model->nombre, 
								$model->apellido, 
								$model->sexo, 
								$model->email, 
								$model->password
							);
				
				//envio el emails
				$mail = new EnviarEmail; 

				$asunto = utf8_decode('>Confirmar cuenta...'); //utf8_decode: para evitar caracteres sin sentido
				$mensaje = utf8_decode("Para confirmar su cuenta vaya a la siguiente direccion: " . 
				    		"<a href='http://localhost/tutorial-yii/index.php?r=site/registro&email=". $model->email .
							"&codigo_verificacion=" . $consulta->codigo_verificacion ."'>Confirmar cuenta</a>");

				$mail->enviar(
						array(Yii::app()->params['adminEmail'], Yii::app()->name),
						array($model->email, $model->nombre),
						$asunto,
						$mensaje
				);


				$mensaje = 'Registro con Éxito!';

				$model->unsetAttributes(); //limpio todos los campos en caso de OK
			}
		}

		//paso los datos de model y el mesjae a mostrar
		$this->render('registro', array('model' => $model, 'mensaje' => $mensaje));

	}
}