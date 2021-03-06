<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() && !WebUser::isAdmin()){
			$this->redirect(array('default/login'));
		}else{
			$userpt=new UserPT('search');
	        $userpt->unsetAttributes();  // clear any default values
	        if(isset($_GET['UserPT']))
	            $userpt->attributes=$_GET['UserPT'];
			$this->render('index',array(
				'userpt'=>$userpt
			));
		}
	}
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '\layouts\blank';
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

	public function actionError(){
		$this->layout = 'layouts\blank';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
