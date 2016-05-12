<?php

class UserController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + accept + reject', // we only allow deletion via POST request
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
                    'accept','reject'
                ),
                'users'=>array('@'),
                'roles'=>array(WebUser::ROLE_ADMIN)
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionAccept($id){
        $model = $this->loadModelUserPT($id);
        try {
            $model->accept();
            $model->sendAcceptEmail();
            Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> akun perguruan tinggi telah berhasil diverifikasi.'));
        } catch (Exception $e) {
            Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal!</b> terjadi kesalahan pada saat melakukan verifikasi.'));
        }

        $this->redirect(array('default/index'));
    }

    public function actionReject($id){
        $model = $this->loadModelUserPT($id);
        $model = $this->loadModelUserPT($id);
        try {
            $model->reject();
            $model->sendRejectEmail();
            Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> akun perguruan tinggi telah berhasil ditolak.'));
        } catch (Exception $e) {
            Yii::app()->user->setFlash('info',MyFormatter::alertError('<b>Gagal!</b> terjadi kesalahan pada saat melakukan tolak verifikasi.'));
        }

        $this->redirect(array('default/index'));
    }

    public function loadModelUserPT($id)
    {
        $model=UserPT::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
