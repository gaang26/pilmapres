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
					'sarjana','diploma',
					'finalis'
				),
				'users'=>array('@'),
				'roles'=>array(WebUser::ROLE_JURI)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionFinalis(){
		$dataProvider=new CActiveDataProvider('Peserta',array(
			'criteria'=>array(
				'condition'=>'TAHUN=:tahun AND TAHAP_AWAL=:finalis',
				'params'=>array(
					':tahun'=>Yii::app()->params['tahun'],
					':finalis'=>Peserta::LOLOS
				),
				'order'=>'NAMA ASC'
			),
			'pagination'=>false
		));

		$this->render('index_datatables_finalis',array(
			'dataProvider'=>$dataProvider
		));
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

		$komentar = new Komentar;
		$komentar->ID_PESERTA = $model->ID_PESERTA;
		$komentar->ID_JURI = Yii::app()->user->getState('id_user');

		if(isset($_POST['Komentar'])){
			$komentar->attributes = $_POST['Komentar'];
			$komentar->TANGGAL_INPUT = date('Y-m-d H:i:s');
			if($komentar->save()){
				Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> komentar telah berhasil disimpan.'));
				$komentar->KOMENTAR = '';
				if($komentar->BIDANG==Komentar::KTI){
					$this->redirect(array('peserta/view','id'=>$id,'#'=>'karyatulis'));
				}else if($komentar->BIDANG==Komentar::PRESTASI){
					$this->redirect(array('peserta/view','id'=>$id,'#'=>'prestasi'));
				}else if($komentar->BIDANG==Komentar::VIDEO){
					$this->redirect(array('peserta/view','id'=>$id,'#'=>'video'));
				}else{
					$this->redirect(array('peserta/view','id'=>$id));
				}
			}
		}

		$this->render('view',array(
			'model'=>$model,
			'komentar'=>$komentar
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
		// $model=new Peserta('search');
		// $model->unsetAttributes();  // clear any default values
		// if(isset($_GET['Peserta']))
		// 	$model->attributes=$_GET['Peserta'];
		//
		// $this->render('index_datatables',array(
		// 	'model'=>$model,
		// ));


		$dataProvider=new CActiveDataProvider('Peserta',array(
			'criteria'=>array(
				'condition'=>'TAHUN=:tahun',
				'params'=>array(
					':tahun'=>Yii::app()->params['tahun']
				),
				'order'=>'NAMA ASC'
			),
			'pagination'=>false
		));

		/*$criteria = new CDbCriteria();
		$criteria->condition = 'TAHUN=:tahun';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun']
		);
		$model = Peserta::model()->findAll($criteria);*/

		$this->render('index_datatables',array(
			'dataProvider'=>$dataProvider
		));
	}

	public function actionSarjana()
	{
		// $model=new Peserta('search');
		// $model->unsetAttributes();  // clear any default values
		// if(isset($_GET['Peserta']))
		// 	$model->attributes=$_GET['Peserta'];
		//
		// $this->render('index_sarjana',array(
		// 	'model'=>$model,
		// ));

		$dataProvider=new CActiveDataProvider('Peserta',array(
			'criteria'=>array(
				'condition'=>'TAHUN=:tahun AND JENJANG=:jenjang',
				'params'=>array(
					':tahun'=>Yii::app()->params['tahun'],
					':jenjang'=>Peserta::SARJANA
				),
				'order'=>'NAMA ASC'
			),
			'pagination'=>false
		));

		$this->render('index_datatables_sarjana',array(
			'dataProvider'=>$dataProvider
		));
	}

	public function actionDiploma()
	{
		$dataProvider=new CActiveDataProvider('Peserta',array(
			'criteria'=>array(
				'condition'=>'TAHUN=:tahun AND JENJANG=:jenjang',
				'params'=>array(
					':tahun'=>Yii::app()->params['tahun'],
					':jenjang'=>Peserta::DIPLOMA
				),
				'order'=>'NAMA ASC'
			),
			'pagination'=>false
		));

		$this->render('index_datatables_diploma',array(
			'dataProvider'=>$dataProvider
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
