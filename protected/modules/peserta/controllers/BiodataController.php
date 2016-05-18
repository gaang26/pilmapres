<?php

class BiodataController extends Controller
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
                    'index','update',
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
		// $model = $this->loadModel();
		// if($model->isBiodataEmpty()){
		// 	$this->redirect(array('biodata/update'));
		// }
		//
		// $this->render('index',array(
		// 	'model'=>$model
		// ));

		$this->redirect(array('biodata/update'));
	}

    public function actionUpdate(){
        $model = $this->loadModel();
		$model->scenario = 'update-profil';

		$sosmed = new PesertaSosialMedia;

		if(isset($_POST['Peserta'],$_POST['PesertaSosialMedia'])){
			$model->attributes = $_POST['Peserta'];
			$sosmed->attributes = $_POST['PesertaSosialMedia'];

			if (CUploadedFile::getInstance($model, 'PHOTO') != NULL) {
				//jika sebelumnya telah mengupload file kti
				if ($model->PHOTO != NULL && file_exists(Yii::app()->basePath . '/../file/foto/' . $model->PHOTO)) {
					// maka dihapus filenya, diganti dengan yang baru
					unlink(Yii::app()->basePath . '/../file/foto/' . $model->PHOTO);
				}
				//mengambil value dari fileupload
				$model->PHOTO = CUploadedFile::getInstance($model, 'PHOTO');
			}

			if (CUploadedFile::getInstance($model, 'KTM') != NULL) {
				//jika sebelumnya telah mengupload file kti
				if ($model->KTM != NULL && file_exists(Yii::app()->basePath . '/../file/ktm/' . $model->KTM)) {
					// maka dihapus filenya, diganti dengan yang baru
					unlink(Yii::app()->basePath . '/../file/ktm/' . $model->KTM);
				}
				//mengambil value dari fileupload
				$model->KTM = CUploadedFile::getInstance($model, 'KTM');
			}

			if (CUploadedFile::getInstance($model, 'SURAT_PENGANTAR') != NULL) {
				//jika sebelumnya telah mengupload file kti
				if ($model->SURAT_PENGANTAR != NULL && file_exists(Yii::app()->basePath . '/../file/pengantar/' . $model->SURAT_PENGANTAR)) {
					// maka dihapus filenya, diganti dengan yang baru
					unlink(Yii::app()->basePath . '/../file/pengantar/' . $model->SURAT_PENGANTAR);
				}
				//mengambil value dari fileupload
				$model->SURAT_PENGANTAR = CUploadedFile::getInstance($model, 'SURAT_PENGANTAR');
			}

			if($model->validate()){
				//proses upload dan menyimpan dalam database
                if (CUploadedFile::getInstance($model, 'PHOTO') != NULL) {
                    if ($model->PHOTO) {
						$nama = strtoupper(str_replace(' ','_',$model->NAMA));
                        $nama_file = $model->JENJANG.'_'.$nama.'_'.$model->PIN.'_PHOTO_'.str_replace(' ','_',$model->PHOTO);
                        //simpan file ke server
                        $model->PHOTO->saveAs(Yii::app()->basePath . '/../file/foto/' . $nama_file);
                        $model->setAttribute('PHOTO', $nama_file); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }

				if (CUploadedFile::getInstance($model, 'KTM') != NULL) {
                    if ($model->KTM) {
						$nama = strtoupper(str_replace(' ','_',$model->NAMA));
                        $nama_file = $model->JENJANG.'_'.$nama.'_'.$model->PIN.'_KTM_'.str_replace(' ','_',$model->KTM);
                        //simpan file ke server
                        $model->KTM->saveAs(Yii::app()->basePath . '/../file/ktm/' . $nama_file);
                        $model->setAttribute('KTM', $nama_file); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }

				if (CUploadedFile::getInstance($model, 'SURAT_PENGANTAR') != NULL) {
                    if ($model->SURAT_PENGANTAR) {
						$nama = strtoupper(str_replace(' ','_',$model->NAMA));
                        $nama_file = $model->JENJANG.'_'.$nama.'_'.$model->PIN.'_SURAT_PENGANTAR_'.str_replace(' ','_',$model->SURAT_PENGANTAR);
                        //simpan file ke server
                        $model->SURAT_PENGANTAR->saveAs(Yii::app()->basePath . '/../file/pengantar/' . $nama_file);
                        $model->setAttribute('SURAT_PENGANTAR', $nama_file); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }

				if($model->save()){
					foreach (MasterSosialMedia::getAll() as $datamaster) {
						$existing = $model->getSocialMedia($datamaster->ID_SOSIAL_MEDIA);
	                    if($existing!=null){
	                        $_sosmed = $existing;
							$_sosmed->KETERANGAN = $sosmed->KETERANGAN[$datamaster->ID_SOSIAL_MEDIA];

							$_sosmed->save();
	                    }else{
	                        $_sosmed = new PesertaSosialMedia;
							$_sosmed->ID_PESERTA = $model->ID_PESERTA;
							$_sosmed->ID_SOSIAL_MEDIA = $datamaster->ID_SOSIAL_MEDIA;
							$_sosmed->KETERANGAN = $sosmed->KETERANGAN[$datamaster->ID_SOSIAL_MEDIA];
							$_sosmed->TANGGAL_INPUT = date('Y-m-d H:i:s');

							if($sosmed->KETERANGAN[$datamaster->ID_SOSIAL_MEDIA]!='' || $sosmed->KETERANGAN[$datamaster->ID_SOSIAL_MEDIA]!=null){
								$_sosmed->save();
							}
	                    }
					}

					Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Informasi biodata telah berhasil disimpan.'));
					if($model->isKaryaTulisEmpty()){
						$this->redirect(array('kti/update'));
					}else{
						$this->redirect(array('biodata/update'));
					}
				}
			}

		}
        $this->render('update',array(
            'model'=>$model,
			'sosmed'=>$sosmed
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
