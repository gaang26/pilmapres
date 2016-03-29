<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() || !WebUser::isUserPT()){
			$this->redirect(array('default/login'));
		}else{
			$this->render('index');
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new PTLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['PTLoginForm']))
		{
			$model->attributes=$_POST['PTLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('default/index'));
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
		$this->redirect(array('default/index'));
	}

	public function actionError(){
		$this->render('error');
	}

	public function actionLupaPassword(){
		$model = new UserPT;
		$model->scenario = 'lupa-password';

		if(isset($_POST['UserPT'])){
			$model->attributes = $_POST['UserPT'];

			if($model->validate()){
				$model->sendEmailLupaPassword();
			}
		}

		$this->render('lupapassword',array('model'=>$model));
	}
}
