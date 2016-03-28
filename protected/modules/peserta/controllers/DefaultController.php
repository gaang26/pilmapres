<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() || !WebUser::isPeserta()){
			$this->redirect(array('default/login'));
		}else{
			$peserta = $this->loadModel();
			if($peserta->isBiodataEmpty()){
				$this->redirect(array('biodata/update'));
			}else if($peserta->isKaryaTulisEmpty()){
				$this->redirect(array('kti/update'));
			}else if($peserta->isVideoEmpty()){
				$this->redirect(array('video/update'));
			}
			$this->render('index',array('peserta'=>$peserta));
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new PesertaLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['PesertaLoginForm']))
		{
			$model->attributes=$_POST['PesertaLoginForm'];
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

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Peserta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{
        $id = Yii::app()->user->getState('id_peserta');
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PESERTA=:peserta AND TAHUN=:tahun';
		$criteria->params = array(
			':peserta'=>$id,
			':tahun'=>Yii::app()->params['tahun']
		);
		$model=Peserta::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
