<?php

class MahasiswaController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('daftar','view'),
				'users'=>array('@'),
				'roles'=>array(WebUser::ROLE_PT)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDaftar($jenjang){
		if($jenjang!=Peserta::SARJANA && $jenjang!=Peserta::DIPLOMA){
			echo "SALAH JENJANG";
		}else{
			$peserta = Peserta::getPeserta(Yii::app()->user->getState('id_user'),Yii::app()->user->getState('role'),$jenjang);
			if($peserta===null){
				$model = new Peserta;
				$model->scenario = 'daftar';
				$model->JENJANG = $jenjang;
				$model->ROLE = WebUser::ROLE_PESERTA;
				$model->TAHUN = Yii::app()->params['tahun'];
				$model->ID_PT = Yii::app()->user->getState('id_pt');
				$model->ID_USER = Yii::app()->user->getState('id_user');
				$model->ROLE_USER = Yii::app()->user->getState('role');


				if(isset($_POST['Peserta'])){
					$model->attributes = $_POST['Peserta'];

					$model->PIN = $model->generatePIN();
					$model->PASSWORD = $model->generatePassword();
					$model->TANGGAL_INPUT = date('Y-m-d H:i:s');

					if($model->validate()){
						$model->NAMA = trim(strtoupper($model->NAMA));
						if($model->save()){
							Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Selamat!</b> peserta atas nama '.$model->NAMA.' telah berhasil didaftarkan.'));
							$this->redirect(array('default/index'));
						}
					}
				}


				$this->render('daftar',array(
					'model'=>$model
				));
			}else{
				echo "SUDAH ENTRI";
			}
		}

	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Peserta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peserta']))
		{
			$model->attributes=$_POST['Peserta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_PESERTA));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peserta']))
		{
			$model->attributes=$_POST['Peserta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_PESERTA));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Peserta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Peserta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
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

	/**
	 * Performs the AJAX validation.
	 * @param Peserta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='peserta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
