<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->redirect(array('peserta/index'));
		//$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '\layouts\blank';
		$model=new JuriLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['JuriLoginForm']))
		{
			$model->attributes=$_POST['JuriLoginForm'];
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
		$this->layout = '\layouts\blank';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionGantiPassword(){
		if(Yii::app()->user->isGuest){
			$this->redirect(array('/site/index'));
		}
		$model = new UbahPasswordForm;
        if (isset($_POST['UbahPasswordForm'])) {
            $model->attributes = $_POST['UbahPasswordForm'];
            if ($model->validate()) {
                if ($model->cekOldPasswordJuri($model->OLD)) {
                    if ($model->savePasswordJuri($model->NEW)) {
                        Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Password telah berhasil diubah.'));
						$model->unsetAttributes();
						//$this->redirect(array('index'));
                    }
                    else
                        Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password gagal diubah.'));
                }
                else {
                    Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password lama salah.'));
                }
            }
        }
        $this->render('ubahpassword/index', array('model' => $model));
	}
}
