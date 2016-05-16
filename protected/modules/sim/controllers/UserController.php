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
            'postOnly + delete + accept + reject', // we only allow deletion via POST request
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
                    'index',
                    'accept','reject',
                    'admin','create','update','delete',
                    'kopertis',
                    'juri',
                    'pt',
                ),
                'users'=>array('@'),
                'roles'=>array(WebUser::ROLE_ADMIN)
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionAdmin(){
        $user=new User('search');
        $user->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $user->attributes=$_GET['User'];
        $this->render('admin/index',[
            'user'=>$user
        ]);
    }

    public function actionKopertis(){
        $user=new UserKopertis('search');
        $user->unsetAttributes();  // clear any default values
        if(isset($_GET['UserKopertis']))
            $user->attributes=$_GET['UserKopertis'];
        $this->render('kopertis/index',[
            'user'=>$user
        ]);
    }

    public function actionPt(){
        $user=new UserPT('search');
        $user->unsetAttributes();  // clear any default values
        if(isset($_GET['UserPT']))
            $user->attributes=$_GET['UserPT'];
        $this->render('pt/index',[
            'user'=>$user
        ]);
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type)
    {
        if($type==WebUser::ROLE_ADMIN){
            $model=new User;
            $model->scenario = 'create';
            $model->ROLE = WebUser::ROLE_ADMIN;

            if(isset($_POST['User']))
            {
                $model->attributes=$_POST['User'];
                $temp_password = $model->PASSWORD;
                $temp_password_repeat = $model->PASSWORD_REPEAT;
                $model->TANGGAL_INPUT = date('Y-m-d H:i:s');
                if($model->validate()){
                    $model->PASSWORD = md5($model->PASSWORD);
                    $model->PASSWORD_REPEAT = md5($model->PASSWORD_REPEAT);
                    if($model->save()){
                        //$model->sendConfirmationEmail();
                        Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> User baru telah berhasil ditambahkan.'));
                        $this->redirect(array('user/admin'));
                    }
                }else{
                    $model->PASSWORD = $temp_password;
                    $model->PASSWORD_REPEAT = $temp_password_repeat;
                }
            }

            $this->render('admin/create',array(
                'model'=>$model,
            ));
        }else if($type==WebUser::ROLE_PT){
            //
        }else if($type==WebUser::ROLE_KOPERTIS){
            $model=new UserKopertis;
            $model->scenario = 'create';
            $model->ROLE = WebUser::ROLE_KOPERTIS;

            if(isset($_POST['UserKopertis']))
            {
                $model->attributes=$_POST['UserKopertis'];
                $temp_password = $model->PASSWORD;
                $temp_password_repeat = $model->PASSWORD_REPEAT;
                $model->TANGGAL_INPUT = date('Y-m-d H:i:s');
                $model->TANGGAL_UPDATE = date('Y-m-d H:i:s');
                $model->TAHUN = Yii::app()->params['tahun'];
                if($model->validate()){
                    $model->PASSWORD = md5($model->PASSWORD);
                    $model->PASSWORD_REPEAT = md5($model->PASSWORD_REPEAT);
                    if($model->save()){
                        //$model->sendConfirmationEmail();
                        Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> User baru telah berhasil ditambahkan.'));
                        $this->redirect(array('user/kopertis'));
                    }
                }else{
                    $model->PASSWORD = $temp_password;
                    $model->PASSWORD_REPEAT = $temp_password_repeat;
                }
            }

            $this->render('kopertis/create',array(
                'model'=>$model,
            ));
        }else if($type==WebUser::ROLE_JURI){
            //
        }else{
            //
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($type,$id)
    {
        if($type==WebUser::ROLE_ADMIN){
            $model=$this->loadModelUser($id);

            if(isset($_POST['User']))
            {
                $model->attributes=$_POST['User'];
                if($model->save()){
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Perubahan user telah berhasil disimpan.'));
                    $this->redirect(array('user/admin'));
                }
            }

            $this->render('admin/update',array(
                'model'=>$model,
            ));
        }else if($type==WebUser::ROLE_PT){
            $model=$this->loadModelUserPT($id);

            if(isset($_POST['UserPT']))
            {
                $model->attributes=$_POST['UserPT'];
                if($model->save()){
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Perubahan user telah berhasil disimpan.'));
                    $this->redirect(array('user/pt'));
                }
            }

            $this->render('pt/update',array(
                'model'=>$model,
            ));
        }else if($type==WebUser::ROLE_KOPERTIS){
            $model=$this->loadModelUserKopertis($id);

            if(isset($_POST['UserKopertis']))
            {
                $model->attributes=$_POST['UserKopertis'];
                if($model->save()){
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> Perubahan user telah berhasil disimpan.'));
                    $this->redirect(array('user/kopertis'));
                }
            }

            $this->render('kopertis/update',array(
                'model'=>$model,
            ));
        }else if($type==WebUser::ROLE_JURI){
            //
        }else{
            //
        }
    }

    public function actionDelete($type,$id){
        if($type==WebUser::ROLE_ADMIN){
            $model=$this->loadModelUser($id);
            if($model->delete()){
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> user telah berhasil dihapus.'));
                $this->redirect(array('user/admin'));
            }
        }else if($type==WebUser::ROLE_PT){
            $model=$this->loadModelUserPT($id);
            if($model->delete()){
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> user telah berhasil dihapus.'));
                $this->redirect(array('user/pt'));
            }
        }else if($type==WebUser::ROLE_KOPERTIS){
            $model=$this->loadModelUserKopertis($id);
            if($model->delete()){
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<b>Sukses!</b> user telah berhasil dihapus.'));
                $this->redirect(array('user/kopertis'));
            }
        }else if($type==WebUser::ROLE_JURI){
            //
        }else{
            //
        }
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

    public function loadModelUser($id)
    {
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadModelUserPT($id)
    {
        $model=UserPT::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadModelUserKopertis($id)
    {
        $model=UserKopertis::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadModelUserJuri($id)
    {
        $model=UserJuri::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
