<?php

class PrestasiController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + hapus', // we only allow deletion via POST request
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
                    'index','update','tambah','hapus','view'
                ),
				'users'=>array('@'),
				'roles'=>array(WebUser::ROLE_PESERTA)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex(){
		$model = $this->loadModel();
		if($model->isPrestasiEmpty()){
			$this->redirect(array('prestasi/tambah'));
		}

		$this->render('index',array(
			'model'=>$model
		));
	}

    public function actionTambah()
	{
		$model=new PesertaPrestasi;
		$model->scenario = 'new-prestasi';
		$model->ID_PESERTA = Yii::app()->user->getState('id_peserta');
		if($model->isAvailable()){
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['PesertaPrestasi']))
			{
				$model->attributes=$_POST['PesertaPrestasi'];

	            /*pencapaian lainnya*/
				if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
					$model->OTHERS=$model->PENCAPAIAN;

                $model->ID_PRESTASI = $model->generateID();

				if (CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT') != NULL) {
					$model->FILE_SERTIFIKAT = CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT');
				}
				if($model->validate()){
					//proses upload dan menyimpan dalam database
					$path = Yii::app()->basePath . '/../file/prestasi/'.Yii::app()->params['tahun'].'/';
	                if (CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT') != NULL) {
	                	$model->FILE_SERTIFIKAT = CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT');
	                    if ($model->FILE_SERTIFIKAT) {
	                    	$name = $_FILES['PesertaPrestasi']['name']['FILE_SERTIFIKAT'];
							$ext = end((explode(".", $name)));
							$nama_prestasi = str_replace(' ', '_', $model->NAMA_PRESTASI);
							$nama_prestasi = str_replace('/', '_', $nama_prestasi);

							$nama = strtoupper(str_replace(' ','_',$model->Peserta->NAMA));
	                        $fullImgName = $model->Peserta->JENJANG.'_'.$nama.'_'.$model->Peserta->PIN.'_'.$model->PRIORITAS.$model->ID_PRESTASI.'_SERTIFIKAT_'.$nama_prestasi.'.'.$ext;
	                        //$fullImgName = $model->FILE_SERTIFIKAT;
	                        //mengcopy file ke drive server
	                        $model->FILE_SERTIFIKAT->saveAs($path. $fullImgName);
	                        $model->setAttribute('SERTIFIKAT', $fullImgName); //memberikan nama lampiran sesuai dengan nama file yang diupload
	                    }
	                }

					/*pencapaian lainnya*/
					if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
						$model->OTHERS=$model->PENCAPAIAN;
					else
						$model->PENCAPAIAN=$model->OTHERS;
					/*end pencapaian lainnya*/

					$model->TANGGAL_INPUT = date('Y-m-d H:i:s');
					if($model->save()){
						Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses !</b> Prestasi unggulan baru telah berhasil ditambahkan'));
						$this->redirect(array('prestasi/view','id'=>$model->ID_PRESTASI));
					}
				}else{
					if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
						$model->OTHERS='';
					Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal !</b> Terjadi kesalahan pada kolom isian data, silahkan cek kolom yang berwarna merah.'));
				}
			}

			$this->render('tambah',array(
				'model'=>$model,
			));
		}else{
			Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal !</b> Anda hanya bisa menambahkan '.PesertaPrestasi::MAKS_PRESTASI.' prestasi yang diunggulkan.'));
			$this->redirect(array('prestasi/index'));
		}
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModelPrestasi($id);
		$model->scenario = 'edit-prestasi';
		//$model->ID_PESERTA = Yii::app()->user->getState('id_peserta');
		if(true){
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['PesertaPrestasi']))
			{
				$model->attributes=$_POST['PesertaPrestasi'];

	            /*pencapaian lainnya*/
				if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
					$model->OTHERS=$model->PENCAPAIAN;

				if (CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT') != NULL) {
					$model->FILE_SERTIFIKAT = CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT');
				}
				if($model->validate()){
					//proses upload dan menyimpan dalam database
					$path = Yii::app()->basePath . '/../file/prestasi/'.Yii::app()->params['tahun'].'/';
	                if (CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT') != NULL) {

						// REMOVE EXISTING
						if($model->SERTIFIKAT!=null && $model->SERTIFIKAT!='' && file_exists($path.$model->SERTIFIKAT)){
							unlink($path.$model->SERTIFIKAT);
						}
						// END REMOVE EXISTING

	                	$model->FILE_SERTIFIKAT = CUploadedFile::getInstance($model, 'FILE_SERTIFIKAT');
	                    if ($model->FILE_SERTIFIKAT) {
	                    	$name = $_FILES['PesertaPrestasi']['name']['FILE_SERTIFIKAT'];
							$ext = end((explode(".", $name)));
							$nama_prestasi = str_replace(' ', '_', $model->NAMA_PRESTASI);
							$nama_prestasi = str_replace('/', '_', $nama_prestasi);

							$nama = strtoupper(str_replace(' ','_',$model->Peserta->NAMA));
	                        $fullImgName = $model->Peserta->JENJANG.'_'.$model->Peserta->BIDANG.'_'.$nama.'_'.$model->Peserta->PIN.'_'.$model->PRIORITAS.$model->ID_PRESTASI.'_SERTIFIKAT_'.$nama_prestasi.'.'.$ext;
	                        //$fullImgName = $model->SERTIFIKAT;
	                        //mengcopy file ke drive server
	                        $model->FILE_SERTIFIKAT->saveAs($path. $fullImgName);
	                        $model->setAttribute('SERTIFIKAT', $fullImgName); //memberikan nama lampiran sesuai dengan nama file yang diupload
	                    }
	                }

					/*pencapaian lainnya*/
					if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
						$model->OTHERS=$model->PENCAPAIAN;
					else
						$model->PENCAPAIAN=$model->OTHERS;
					/*end pencapaian lainnya*/

					$model->TANGGAL_INPUT = date('Y-m-d H:i:s');
					if($model->save()){
						Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses !</b> Perubahan telah berhasil disimpan'));
						$this->redirect(array('prestasi/view','id'=>$model->ID_PRESTASI));
					}
				}else{
					if($model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA)
						$model->OTHERS='';
					Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal !</b> Terjadi kesalahan pada kolom isian data, silahkan cek kolom yang berwarna merah.'));
				}
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}else{
			Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal !</b> Anda hanya bisa menambahkan 10 prestasi yang diunggulkan.'));
			$this->redirect(array('prestasi/index'));
		}
	}

	public function actionView($id){
		$model = $this->loadModelPrestasi($id);

		$this->render('view',array(
			'model'=>$model
		));
	}

	public function actionHapus($id){
		$model = $this->loadModelPrestasi($id);

		$temp_sertifikat = $model->SERTIFIKAT;

		if($model->delete()){
			$path = Yii::app()->basePath . '/../file/prestasi/'.Yii::app()->params['tahun'].'/';
			if($temp_sertifikat!=null && $temp_sertifikat!='' && file_exists($path.$temp_sertifikat)){
				unlink($path.$temp_sertifikat);
			}
			Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('Sukses!. data prestasi telah berhasil dihapus'));
		}else{
			Yii::app()->user->setFlash('info',MyFormatter::alertError('Gagal!. data prestasi tidak berhasil dihapus'));
		}

		$this->redirect(array('prestasi/index'));
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

	public function loadModelPrestasi($id_prestasi)
	{
		$model=PesertaPrestasi::model()->findByPk($id_prestasi);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
