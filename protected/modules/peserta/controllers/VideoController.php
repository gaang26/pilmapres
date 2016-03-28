<?php

class VideoController extends Controller
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
		$this->redirect(array('video/update'));
	}

    public function actionUpdate(){
        $model = $this->loadModel();
		$model->scenario = 'update-video';

		if(isset($_POST['Peserta'])){
			$model->attributes = $_POST['Peserta'];

			if($model->save()){
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Video kemampuan bahasa inggris telah berhasil diunggah. Pastikan bahwa video Anda dapat diputar pada laman ini. Jika video Anda tidak dapat diputar, maka akan dianggap tidak menyertakan video kemampuan bahasa inggris.'));
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
