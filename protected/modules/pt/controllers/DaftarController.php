<?php

class DaftarController extends Controller
{
	public function actionIndex(){
        $model = new UserPT;
        $model->scenario = 'daftar-baru';
        $model->ROLE = WebUser::ROLE_PT;

        if(isset($_POST['UserPT'])){
            $model->attributes = $_POST['UserPT'];

            $model->TANGGAL_INPUT = date('Y-m-d H:i:s');
            $model->TANGGAL_UPDATE = date('Y-m-d H:i:s');
            $model->TAHUN = Yii::app()->params['tahun'];

            $_password = $model->PASSWORD;
            $_password_repeat = $model->PASSWORD_REPEAT;
            if($model->validate()){
                $model->PASSWORD = md5($model->PASSWORD);
                $model->PASSWORD_REPEAT = md5($model->PASSWORD_REPEAT);
                if($model->save()){
                    $model->sendEmailVerifikasi($_password);
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Pendaftaran Berhasil!</b> Akun Anda akan kami verifikasi terlebih dahulu sebelum dapat digunakan untuk login. Proses verifikasi dilakukan maksimal 1 x 24 jam pada hari dan jam kerja.'));
                    $this->redirect(array('default/login'));
                }else{
                    $model->PASSWORD = $_password;
                    $model->PASSWORD_REPEAT = $_password_repeat;
                }
            }else{
                $model->PASSWORD = $_password;
                $model->PASSWORD_REPEAT = $_password_repeat;
            }
        }
		$this->render('index',array('model'=>$model));
	}
}
