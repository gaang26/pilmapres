<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->redirect(array('peserta/index'));
		//$this->render('index');
	}

	public function actionError(){
		$this->layout = '\layouts\blank';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
