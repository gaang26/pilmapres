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
				'actions'=>array('index'),
				'users'=>array('@'),
				'roles'=>array(WebUser::ROLE_KOPERTIS)
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionIndex(){
        $model = UserKopertis::model()->findByPk(Yii::app()->user->getState('id_user'));
        if($model===null){
            $this->redirect(array('default/login'));
        }
        $model->scenario = 'update-biodata';

        if(isset($_POST['UserKopertis'])){
            $model->attributes = $_POST['UserKopertis'];
            if($model->save()){
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> perubahan biodata telah tersimpan.'));
            }
        }

        $this->render('index',array(
            'model'=>$model
        ));
    }
}
