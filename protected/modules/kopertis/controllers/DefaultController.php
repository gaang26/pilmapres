<?php

class DefaultController extends Controller
{
	public function actionIndex(){
		if(WebUser::isGuest() || !WebUser::isKopertis()){
			$this->redirect(array('default/login'));
		}else{
			$kopertis = MasterKopertis::model()->findByPk(Yii::app()->user->getState('id_kopertis'));
			$peserta = Peserta::getPeserta(Yii::app()->user->getState('id_user'),Yii::app()->user->getState('role'));
			$this->render('index',array(
				'kopertis'=>$kopertis,
				'peserta'=>$peserta
			));
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(!Jadwal::isDaftarPesertaOpen()){
			$this->redirect(array('/site/index'));
		}
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
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLupaPassword(){
		$model = new UserKopertis;
		$model->scenario = 'lupa-password';

		if(isset($_POST['UserKopertis'])){
			$model->attributes = $_POST['UserKopertis'];

			if($model->validate()){
				$model->sendEmailLupaPassword();
				Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> tautan reset password telah dikirim ke email '.$model->EMAIL.'. Silahkan cek email Anda kemudian klik tautan reset password yang tertera pada email tersebut.'));
				$this->redirect(array('default/login'));
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
		$model = UserKopertis::model()->find($criteria);

		if($model!==null){
			$model->scenario = 'reset-password';
			if(isset($_POST['UserKopertis'])){
				$model->attributes = $_POST['UserKopertis'];

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
                if ($model->cekOldPasswordKopertis($model->OLD)) {
                    if ($model->savePasswordKopertis($model->NEW)) {
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
