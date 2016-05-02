<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() || !WebUser::isKopertis()){
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
		$model=new KopertisLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['KopertisLoginForm']))
		{
			$model->attributes=$_POST['KopertisLoginForm'];
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

	public function actionResetpassword($ref){
		$criteria = new CDbCriteria;
		$criteria->condition = 'TOKEN=:token';
		$criteria->params = array(
			':token'=>$ref
		);
		$model = UserPT::model()->find($criteria);

		if($model!==null){
			$model->scenario = 'reset-password';
			if(isset($_POST['UserPT'])){
				$model->attributes = $_POST['UserPT'];

				if($model->validate()){
					$model->PASSWORD = md5($model->NEW_PASSWORD);
					if($model->save()){
						Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> password Anda telah berhasil diperbarui.'));
						$this->redirect(array('default/login'));
					}
				}
			}
			$this->render('resetpassword',array(
				'model'=>$model
			));
		}else{
			$this->redirect(array('default/login'));
		}
	}

	public function actionUbahPassword(){
		if(Yii::app()->user->isGuest){
			$this->redirect(array('/site/index'));
		}
		$model = new UbahPasswordForm;
        if (isset($_POST['UbahPasswordForm'])) {
            $model->attributes = $_POST['UbahPasswordForm'];
            if ($model->validate()) {
                if ($model->cekOldPasswordPT($model->OLD)) {
                    if ($model->savePasswordPT($model->NEW)) {
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
