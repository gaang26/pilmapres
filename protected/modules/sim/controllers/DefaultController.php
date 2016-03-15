<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() && !WebUser::isAdmin()){
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
		$model=new SimLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['SimLoginForm']))
		{
			$model->attributes=$_POST['SimLoginForm'];
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
}
