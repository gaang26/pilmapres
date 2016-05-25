<?php

class PesertaController extends Controller
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
				'actions'=>array(
					'index','view',
					'create','update','admin','delete',
					'unduhkti',
					'prestasi',
					'ktm','pengantar',
					'export',
					'sarjana','diploma'
				),
				'users'=>array('*'),
				//'roles'=>array(WebUser::ROLE_ADMIN)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionExport($jenjang='all')
    {
		if($jenjang=='all'){
			$criteria = new CDbCriteria;
	        $criteria->condition = 'TAHUN=:tahun';
	        $criteria->params = array(':tahun'=>Yii::app()->params['tahun']);
	        $criteria->order = 'NAMA ASC';
	        $model = Peserta::model()->findAll($criteria);

			$filename='Data-Peserta-Mawapres-Nasional-'.Yii::app()->params['tahun'].'.xls';
		}else{
			$criteria = new CDbCriteria;
	        $criteria->condition = 'JENJANG=:jenjang AND TAHUN=:tahun';
	        $criteria->params = array(':jenjang'=>$jenjang,':tahun'=>Yii::app()->params['tahun']);
	        $criteria->order = 'NAMA ASC';
	        $model = Peserta::model()->findAll($criteria);

			$filename='Data-Peserta-Mawapres-Nasional-'.$jenjang.'-'.Yii::app()->params['tahun'].'.xls';
		}


        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);

        $this->renderPartial('export_view',array(
            'model'=>$model,
        ));
        exit();
    }

	public function actionKtm($id){
		$model = $this->loadModel($id);

		$data = array();

		$data['title'] = 'FILE SCAN KTM';
		$data['html'] = $model->getKTM();

		echo json_encode($data);
	}

	public function actionPengantar($id){
		$model = $this->loadModel($id);

		$data = array();

		$data['title'] = 'FILE SCAN SURAT PENGANTAR';
		$data['html'] = $model->getPengantar();

		echo json_encode($data);
	}

	public function actionUnduhkti($id){//$id = ID_PESERTA
		$model = $this->loadModel($id);
		$filename = $model->FILE_KTI;
        $path = Yii::app()->basePath . '/../file/kti/' . $filename;
        $filecontent = file_get_contents($path);
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$model,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionSarjana()
	{
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$this->render('index_sarjana',array(
			'model'=>$model,
		));
	}

	public function actionDiploma()
	{
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$this->render('index_diploma',array(
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
		$model=Peserta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPrestasi($id_prestasi)
	{
		$model=PesertaPrestasi::model()->findByPk($id_prestasi);
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
