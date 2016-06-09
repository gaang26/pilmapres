<?php

class FinalisController extends Controller
{
    public function actionIndex(){
        $sarjana = Peserta::getFinalis(Peserta::SARJANA);
        $diploma = Peserta::getFinalis(Peserta::DIPLOMA);
        $this->render('index',array(
            'diploma'=>$diploma,
            'sarjana'=>$sarjana
        ));
    }

    public function actionPrestasi($id){
		$model = $this->loadModelPrestasi($id);

		$this->render('view_prestasi',array(
			'model'=>$model
		));
	}

    public function actionView($id){
        $model = $this->loadPesertaModel($id);
        $this->render('view',array(
            'model'=>$model
        ));
    }

    public function loadModelPrestasi($id_prestasi)
	{
		$model=PesertaPrestasi::model()->findByPk($id_prestasi);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    public function loadPesertaModel($id)
	{
		$model=Peserta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
