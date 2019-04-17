<?php
class KtiController extends Controller
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
					'unduh',
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
		// if($model->isKaryaTulisEmpty()){
		// 	$this->redirect(array('kti/update'));
		// }
		//
		// $this->render('index',array(
		// 	'model'=>$model
		// ));
		$this->redirect(array('kti/update'));
	}

    public function actionUpdate(){
        $model = $this->loadModel();

		if($model->isKaryaTulisEmpty()){
			$model->scenario = 'update-kti-isi';
		}else{
			$model->scenario = 'update-kti-edit';
		}

		if(isset($_POST['Peserta'])){
			$model->attributes = $_POST['Peserta'];

			if (CUploadedFile::getInstance($model, 'FILE_KTI') != NULL) {
                //jika sebelumnya telah mengupload file kti
                if ($model->FILE_KTI != NULL && file_exists(Yii::app()->basePath . '/../file/kti/' . $model->FILE_KTI)) {
                    // maka dihapus filenya, diganti dengan yang baru
                    unlink(Yii::app()->basePath . '/../file/kti/' . $model->FILE_KTI);
                }
                //mengambil value dari fileupload
                $model->FILE_KTI = CUploadedFile::getInstance($model, 'FILE_KTI');
            }

			if($model->validate()){
				//proses upload dan menyimpan dalam database
                if (CUploadedFile::getInstance($model, 'FILE_KTI') != NULL) {
                    if ($model->FILE_KTI) {
						$nama = strtoupper(str_replace(' ','_',$model->NAMA));
                        $nama_file = $model->JENJANG.'_'.$model->BIDANG.'_'.$nama.'_'.$model->PIN.'_KTI.pdf';
                        //simpan file ke server
                        $model->FILE_KTI->saveAs(Yii::app()->basePath . '/../file/kti/' . $nama_file);
                        $model->setAttribute('FILE_KTI', $nama_file); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }

				if($model->save()){
					Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Informasi karya tulis ilmiah telah berhasil disimpan.'));
					if($model->isVideoEmpty()){
						$this->redirect(array('prestasi/tambah'));
					}else{
						$this->redirect(array('kti/update'));
					}
				}
			}

		}
        $this->render('update',array(
            'model'=>$model
        ));
    }

	public function actionUnduh()
    {
        $model=$this->loadModel();
        $filename = $model->FILE_KTI;
        $path = Yii::app()->basePath . '/../file/kti/' . $filename;
        $filecontent = file_get_contents($path);
        header("Content-Type: text/plain");
        header("Content-disposition: attachment; filename=$filename");
        header("Pragma: no-cache");
        echo $filecontent;
        exit;
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
