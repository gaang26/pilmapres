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
                    'index','update','tambah',
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
				if($model->validate()){
					//proses upload dan menyimpan dalam database
					$path = Yii::app()->basePath . '/../file/prestasi/'.Yii::app()->params['tahun'].'/';
	                if (CUploadedFile::getInstance($model, 'SERTIFIKAT') != NULL) {
	                	$model->SERTIFIKAT = CUploadedFile::getInstance($model, 'SERTIFIKAT');
	                    if ($model->SERTIFIKAT) {
	                    	$name = $_FILES['PesertaPrestasi']['name']['SERTIFIKAT'];
							$ext = end((explode(".", $name)));
							$nama_prestasi = str_replace(' ', '_', $model->NAMA_PRESTASI);
							$nama_prestasi = str_replace('/', '_', $nama_prestasi);
	                        $fullImgName = $model->ID_PESERTA.'_'.$model->KODE_PRESTASI.'_'.$model->SORT_ORDER.'_SERTIFIKAT_'.$nama_prestasi.'.'.$ext;
	                        //$fullImgName = $model->SERTIFIKAT;
	                        //mengcopy file ke drive server
	                        $model->SERTIFIKAT->saveAs($path. $fullImgName);
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
						$this->redirect(array('prestasi/index'));
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
			Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal !</b> Anda hanya bisa menambahkan 10 prestasi yang diunggulkan.'));
			$this->redirect(array('prestasi/index'));
		}
	}

    public function actionUpdate(){
        $model = $this->loadModel();
		$model->scenario = 'update-profil';

		if(isset($_POST['Peserta'])){
			$model->attributes = $_POST['Peserta'];

			if($model->save()){
				$this->redirect(array('default/index'));
			}
		}
        $this->render('update',array(
            'model'=>$model
        ));
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
