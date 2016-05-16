<?php

/**
 * This is the model class for table "user_pt".
 *
 * The followings are the available columns in table 'user_pt':
 * @property integer $ID_USER
 * @property integer $ID_PT
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property string $TAHUN
 * @property integer $ROLE
 * @property string $NAMA
 * @property string $HP
 * @property string $TELP
 * @property integer $STATUS
 * @property integer $VERIFIKATOR
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 *
 * The followings are the available model relations:
 * @property User $vERIFIKATOR
 * @property MasterPt $iDPT
 */
class UserPT extends CActiveRecord
{
	const ACTIVE = 1;
	const PENDING = 0;
	const REJECTED = -1;

	public $PASSWORD_REPEAT;
	public $NEW_PASSWORD;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_pt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ID_PT, EMAIL, PASSWORD, TAHUN, ROLE, TANGGAL_UPDATE', 'required'),
			array('ID_PT, EMAIL, NAMA, PASSWORD, TAHUN, ROLE, HP, TANGGAL_UPDATE, PASSWORD_REPEAT', 'required','on'=>'daftar-baru','message'=>'{attribute} ini tidak boleh dikosongkan'),
			array('ID_PT, EMAIL, NAMA, PASSWORD, TAHUN, ROLE, HP, TANGGAL_UPDATE', 'required','on'=>'update-biodata','message'=>'{attribute} ini tidak boleh dikosongkan'),
			array('ID_PT, EMAIL', 'required', 'on'=>'lupa-password'),
			array('EMAIL','checkEmailLupaPassword','on'=>'lupa-password'),
			array('NEW_PASSWORD, PASSWORD, PASSWORD_REPEAT','required','on'=>'reset-password'),
			array('ID_PT, ROLE, STATUS, VERIFIKATOR', 'numerical', 'integerOnly'=>true),
			array('EMAIL, NAMA', 'length', 'max'=>100),
			array('PASSWORD, TOKEN', 'length','min'=>6, 'max'=>50),
			array('TAHUN', 'length', 'max'=>4),
			array('HP, TELP', 'length', 'max'=>20),
			array('TANGGAL_INPUT', 'safe'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'NEW_PASSWORD','on'=>'reset-password','message'=>'Password tidak cocok'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'PASSWORD','on'=>'daftar-baru','message'=>'Password tidak cocok'),
			array('EMAIL,TAHUN','checkUniqueEmail','on'=>'daftar-baru,update-biodata'),
			array('ID_PT,TAHUN','checkUniquePT','on'=>'daftar-baru'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USER, ID_PT, EMAIL, PASSWORD, TAHUN, ROLE, NAMA, HP, TELP, STATUS, VERIFIKATOR, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe', 'on'=>'search'),
		);
	}

	public function checkEmailLupaPassword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PT=:pt AND TAHUN=:tahun';
		$criteria->params = array(
			':pt'=>$this->ID_PT,
			':tahun'=>Yii::app()->params['tahun']
		);

		$model = self::model()->find($criteria);

		if($model!==null){
			if($this->EMAIL!==$model->EMAIL)
				$this->addError('EMAIL','Email yang Anda masukkan tidak sesuai dengan email yang Anda gunakan pada saat mendaftar.');
		}else{
			$this->addError('ID_PT','Perguruan tinggi belum terdaftar. Silahkan mendaftar terlebih dahulu.');
		}
	}

	public function checkUniquePT($attribute,$params){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PT=:pt AND TAHUN=:tahun AND (STATUS=:pending OR STATUS=:active)';
		$criteria->params = array(
			':pt'=>$this->ID_PT,
			':tahun'=>$this->TAHUN,
			':active'=>self::ACTIVE,
			':pending'=>self::PENDING,
		);

		$model = self::model()->find($criteria);

		if($model!==null){
			$this->addError('ID_PT','Perguruan tinggi sudah terdaftar pada tanggal '.$model->TANGGAL_INPUT.' dengan email '.$model->EMAIL);
		}
	}

	public function checkUniqueEmail($attribute,$params){
		$criteria = new CDbCriteria;
		$criteria->condition = 'EMAIL=:email AND TAHUN=:tahun AND (STATUS=:pending OR STATUS=:active)';
		$criteria->params = array(
			':email'=>$this->EMAIL,
			':tahun'=>$this->TAHUN,
			':active'=>self::ACTIVE,
			':pending'=>self::PENDING,
		);

		$model = self::model()->find($criteria);

		if($model!==null && $model->EMAIL!=Yii::app()->user->getState('email')){
			$this->addError('EMAIL','Email '.$this->EMAIL.' sudah terdaftar pada tanggal '.$model->TANGGAL_INPUT.' dengan perguruan tinggi '.$model->PT->NAMA);
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Verifikator' => array(self::BELONGS_TO, 'User', 'VERIFIKATOR'),
			'PT' => array(self::BELONGS_TO, 'MasterPT', 'ID_PT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USER' => 'Id User',
			'ID_PT' => 'Perguruan Tinggi',
			'EMAIL' => 'Email',
			'PASSWORD' => 'Password',
			'NEW_PASSWORD'=>'Password Baru',
			'PASSWORD_REPEAT' => 'Konfirmasi Password',
			'TAHUN' => 'Tahun',
			'ROLE' => 'Role',
			'NAMA' => 'Nama Lengkap',
			'HP' => 'No HP',
			'TELP' => 'Telp',
			'STATUS' => 'Status',
			'VERIFIKATOR' => 'Verifikator',
			'TANGGAL_INPUT' => 'Tanggal Input',
			'TANGGAL_UPDATE' => 'Tanggal Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'TAHUN=:tahun';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun']
		);

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TELP',$this->TELP,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('VERIFIKATOR',$this->VERIFIKATOR);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPending()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'TAHUN=:tahun AND STATUS=:status';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun'],
			':status'=>self::PENDING
		);

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TELP',$this->TELP,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('VERIFIKATOR',$this->VERIFIKATOR);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserPT the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function isActive(){
		return $this->STATUS==self::ACTIVE;
	}

	public function isPending(){
		return $this->STATUS==self::PENDING;
	}

	public function isRejected(){
		return $this->STATUS==self::REJECTED;
	}

	public function getLabelStatus(){
		if($this->isActive()){
			return '<span class="label label-success">Active</span>';
		}else if($this->isPending()){
			return '<span class="label label-warning">Pending</span>';
		}else if($this->isRejected()){
			return '<span class="label label-danger">Rejected</span>';
		}else{
			return '-';
		}
	}

	public static function optionsStatus(){
		return array(
			self::ACTIVE=>'Active',
			self::PENDING=>'Pending',
			self::REJECTED=>'Rejected',
		);
	}

	public function getUpdateButton(){
		$update =  CHtml::link('<i class="fa fa-pencil"></i> Koreksi',array('user/update','type'=>WebUser::ROLE_PT,'id'=>$this->ID_USER),array(
			'class'=>'btn btn-sm btn-success',
		));

		$button = $update;

		return $button;
	}

	public function getDeleteButton(){
		$delete =  CHtml::link('<i class="fa fa-trash"></i> Hapus','#',array(
			'class'=>'btn btn-sm red',
			'submit'=>array('user/delete','type'=>WebUser::ROLE_PT,'id'=>$this->ID_USER),
			'confirm'=>'Anda akan menghapus user ini. Apakah Anda ingin melanjutkan?'
		));

		$button = $delete;

		return $button;
	}

	public function getAcceptButton(){
		return CHtml::link('<i class="fa fa-check"></i> Verifikasi','#',array(
			'class'=>'btn btn-sm btn-success',
			'submit'=>array('user/accept','id'=>$this->ID_USER),
			'confirm'=>'Anda akan melakukan verifikasi akun ini. Apakah Anda yakin?'
		));
	}

	public function getRejectButton(){
		return CHtml::link('<i class="fa fa-ban"></i> Tolak','#',array(
			'class'=>'btn btn-sm btn-danger',
			'submit'=>array('user/reject','id'=>$this->ID_USER),
			'confirm'=>'Anda akan menolak akun ini. Apakah Anda yakin?'
		));
	}

	public function accept(){
		$this->scenario = 'accept';
		$this->STATUS = self::ACTIVE;
		$this->VERIFIKATOR = Yii::app()->user->getState('id_user');
		return $this->save();
	}

	public function reject(){
		$this->scenario = 'reject';
		$this->STATUS = self::REJECTED;
		$this->VERIFIKATOR = Yii::app()->user->getState('id_user');
		return $this->save();
	}

	public function sendAcceptEmail(){
		$subject = 'Verifikasi Akun Mawapres Nasional '.Yii::app()->params['tahun'];
		$message = '
		<html>
			<head>
				<title>Verifikasi AKun Mawapres Nasional '.Yii::app()->params["tahun"].'</title>
				<style type="text/css">
				body{
					margin:0px;
				}
				.page{
					width:80%;
					margin:0px auto 0px auto;
					border: 1px solid #CCC;
					border-top:3px solid #09A;
					padding: 10px;
				}
				</style>
			</head>
			<body>
				<h1>Selamat !</h1>
				<h3>' . $this->PT->NAMA . ' telah diverifikasi oleh administrator.</h3>
				<p>Anda dapat login ke sistem mawapres nasional untuk mendaftarkan peserta dari perguruan tinggi Anda dengan menggunakan EMAIL: '.$this->EMAIL.' dan password yang Anda cantumkan pada saat mendaftar.</p>
				<br><br>
				<p>Terima kasih.</p>
			</body>
		</html>
		';

		// begin: send email using sendpulse
		$sender = new SendPulseSender;

        $to = array(
            'email'=>$this->EMAIL
        );
        $from = array(
            'name'=>SendPulseSender::SENDER_NAME,
            'email'=>SendPulseSender::SENDER_EMAIL,
        );

        return $sender->sendMail($to,$from,$subject,$message);
		// end: send email using sendpulse
	}

	public function sendRejectEmail(){
		$subject = 'Gagal Verifikasi Akun Mawapres Nasional '.Yii::app()->params['tahun'];
		$message = '
		<html>
			<head>
				<title>Gagal Verifikasi AKun Mawapres Nasional '.Yii::app()->params["tahun"].'</title>
				<style type="text/css">
				body{
					margin:0px;
				}
				.page{
					width:80%;
					margin:0px auto 0px auto;
					border: 1px solid #CCC;
					border-top:3px solid #09A;
					padding: 10px;
				}
				</style>
			</head>
			<body>
				<h1>Mohon maaf !</h1>
				<h3>' . $this->PT->NAMA . ' telah ditolak oleh administrator.</h3>
				<p>Pastikan bahwa Anda benar-benar merupakan pengelola perguruan tinggi.</p>
				<br>
				<p>Terima kasih.</p>
			</body>
		</html>
		';

		// begin: send email using sendpulse
		$sender = new SendPulseSender;

		$to = array(
			'email'=>$this->EMAIL
		);
		$from = array(
			'name'=>SendPulseSender::SENDER_NAME,
			'email'=>SendPulseSender::SENDER_EMAIL,
		);

		return $sender->sendMail($to,$from,$subject,$message);
		// end: send email using sendpulse
	}

	public function sendEmailVerifikasi($password){
		$to = $this->EMAIL;
        //$to = 'cethol@localhost';
		$message = '
		<html>
			<head>
				<title>Pendaftaran Akun Perguruan Tinggi Tahun '.Yii::app()->params["tahun"].'</title>
				<style type="text/css">
				body{
					margin:0px;
				}
				.page{
					width:80%;
					margin:0px auto 0px auto;
					border: 1px solid #CCC;
					border-top:3px solid #09A;
					padding: 10px;
				}
				</style>
			</head>
			<body>
				<h1>Selamat !</h1>
				<h3>' . $this->PT->NAMA . ' telah terdaftar di sistem mawapres online '.Yii::app()->params["tahun"].'.</h3>
				<p>Email : ' . $this->EMAIL . '</br>
				<p>Password : ' . $password . '</p>
				<p>Anda dapat login ke sistem mawapres dengan menggunakan password diatas setelah kami melakukan verifikasi data Anda</p>
				<p>Anda akan diverifikasi maksimal dalam waktu 1 x 24 jam pada hari dan jam kerja.</p>
				<p>Hari Kerja Senin-Jumat<br>Jam Kerja 08.00-17.00</p>
			</body>
		</html>
		';
        $subject = "Pendaftaran Mawapres Tahun ".Yii::app()->params['tahun'];
		// begin: send email using sendpulse
		$sender = new SendPulseSender;

        $to = array(
            'email'=>$this->EMAIL
        );
        $from = array(
            'name'=>SendPulseSender::SENDER_NAME,
            'email'=>SendPulseSender::SENDER_EMAIL,
        );

        return $sender->sendMail($to,$from,$subject,$message);
		// end: send email using sendpulse
	}

	public function sendEmailLupaPassword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'EMAIL=:email AND TAHUN=:tahun';
		$criteria->params = array(
			':email'=>$this->EMAIL,
			':tahun'=>Yii::app()->params['tahun']
		);
		$user = self::model()->find($criteria);
		$user->TOKEN = md5($this->ID_USER.$this->EMAIL);
		$user->save();
		$this->TOKEN = $user->TOKEN;
		$to = $this->EMAIL;
        //$to = 'cethol@localhost';
		$message = '
		<html>
			<head>
				<title>Reset password sistem mawapres</title>
				<style type="text/css">
				body{
					margin:0px;
				}
				.page{
					width:80%;
					margin:0px auto 0px auto;
					border: 1px solid #CCC;
					border-top:3px solid #09A;
					padding: 10px;
				}
				</style>
			</head>
			<body>
				<h3>Hello, ' . $this->PT->NAMA.'</h3>
				<p>Untuk reset password Anda, silahkan klik tautan berikut ini:</p>
				<a href="http://mawapres.dikti.go.id/pt/default/resetpassword/ref/'.$this->TOKEN.'">RESET PASSWORD</a>
				<p>Terima kasih</p>
			</body>
		</html>
		';
        $subject = "Reset Password Sistem Mawapres";

		// begin: send email using sendpulse
		$sender = new SendPulseSender;

        $to = array(
            'email'=>$this->EMAIL
        );
        $from = array(
            'name'=>SendPulseSender::SENDER_NAME,
            'email'=>SendPulseSender::SENDER_EMAIL,
        );

        return $sender->sendMail($to,$from,$subject,$message);
		// end: send email using sendpulse

		// Begin: proses pengiriman email menggunakan mandrill
        // Yii::import('application.extensions.MandrillApp.src.Mandrill', true);
        // $mandrill = new Mandrill(MyMandrill::API_KEY);
		//
        // try{
        //     $message = array(
        //         'subject' => $subject,
        //         'html' => $message, // or just use 'html' to support HTMl markup
        //         'from_email' => Yii::app()->params['adminEmail'],
        //         'from_name' => 'Mawapres Nasional', //optional
        //         'to' => array(
        //             array(
        //                 'email' => $this->EMAIL,
        //                 //'name' => 'Recipient Name', // optional
        //                 'type' => 'to' //optional. Default is 'to'. Other options: cc & bcc
        //             )
        //         ),
        //         'track_opens'=>TRUE,
        //         /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
        //           'track_clicks' => TRUE) go here */
        //     );
		//
        //     $result = $mandrill->messages->send($message);
        // } catch(Mandrill_Error $e) {
        //     echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
        //     throw $e;
        // }
		// End: proses pengiriman email menggunakan mandrill
	}

}
