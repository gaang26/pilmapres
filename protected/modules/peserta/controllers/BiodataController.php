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
