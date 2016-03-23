<?php

class PtModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		Yii::app()->homeUrl = array('default/index');
		Yii::app()->user->loginUrl = array('pt/default/login');
		Yii::app()->setComponents(array(
			'errorHandler'=>array(
				'errorAction'=>'pt/default/error'
			),
		));
		// import the module-level models and components
		$this->setImport(array(
			'pt.models.*',
			'pt.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
