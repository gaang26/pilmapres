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

	public function actionUbahPassword(){
		if(Yii::app()->user->isGuest){
			$this->redirect(array('/site/index'));
		}
		$model = new UbahPasswordForm;
        if (isset($_POST['UbahPasswordForm'])) {
            $model->attributes = $_POST['UbahPasswordForm'];
            if ($model->validate()) {
                if ($model->cekOldPasswordPeserta($model->OLD)) {
                    if ($model->savePasswordPeserta($model->NEW)) {
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

	public function actionLupaPassword(){
		$model = new Peserta;
		$model->scenario = 'lupa-password';

		if(isset($_POST['Peserta'])){
			$model->attributes = $_POST['Peserta'];

			if($model->validate()){
				$model->sendEmailLupaPassword();
				Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> link reset password telah dikirim ke email '.$model->EMAIL.'. Silahkan cek email Anda kemudian klik link reset password yang tertera pada email tersebut.'));
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
		$model = Peserta::model()->find($criteria);

		if($model!==null){
			$model->scenario = 'reset-password';
			if(isset($_POST['Peserta'])){
				$model->attributes = $_POST['Peserta'];

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
