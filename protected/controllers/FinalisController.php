<?php

class FinalisController extends Controller
{
    public function actionKonfirmasi(){
        // if(Yii::app()->user->isGuest || !WebUser::isFinalis()){
        //     $this->redirect(array('finalis/login'));
        // }else{
        //     $this->render('konfirmasi');
        // }

        $this->render('konfirmasi');
    }
    public function actionIndex(){
        $sarjana = Peserta::getFinalis(Peserta::SARJANA);
        $diploma = Peserta::getFinalis(Peserta::DIPLOMA);
        $this->render('index',array(
            'diploma'=>$diploma,
            'sarjana'=>$sarjana
        ));
    }

    public function actionSurat(){
		$filename = "PETUNJUK_TEKNIS_BIDIKMISI_SEKOLAH_".Yii::app()->params["tahun"].".pdf";
		$path = Yii::app()->basePath.'/../file/formatfile/'.$filename;
		$filecontent=file_get_contents($path);
		header("Content-Type: text/plain");
		header("Content-disposition: attachment; filename=$filename");
		header("Pragma: no-cache");
		echo $filecontent;
		exit;
	}

    public function actionPrestasi($id){
		$model = $this->loadModelPrestasi($id);

		$this->render('view_prestasi',array(
			'model'=>$model
		));
	}

    public function actionView($id){
        $model = $this->loadPesertaModel($id);
        if($model->TAHAP_AWAL==Peserta::LOLOS){
            $this->render('view',array(
                'model'=>$model
            ));
        }else{
            $this->redirect(array('index'));
        }
    }

    public function loadModelPrestasi($id_prestasi)
	{
		$model=PesertaPrestasi::model()->findByPk($id_prestasi);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    public function loadPesertaModel($id)
	{
        $criteria = new CDbCriteria;
        $criteria->condition = 'ID_PESERTA=:id AND TAHAP_AWAL=1';
        $criteria->params = array(
            ':id'=>$id
        );
		$model=Peserta::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new PesertaLoginForm;
        $model->scenario = 'login-finalis';

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
			if($model->validate() && $model->loginFinalis())
				$this->redirect(array('finalis/konfirmasi'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionDeadpool()
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
		$this->render('deadpool_login',array('model'=>$model));
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
				$this->redirect(array('finalis/login'));
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
					$model->PASSWORD = $model->NEW_PASSWORD;
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
		$this->redirect(array('finalis/index'));
	}
}
