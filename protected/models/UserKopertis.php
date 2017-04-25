<?php

/**
 * This is the model class for table "user_kopertis".
 *
 * The followings are the available columns in table 'user_kopertis':
 * @property integer $ID_USER
 * @property integer $ID_KOPERTIS
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
 * @property MasterKopertis $iDKOPERTIS
 */
class UserKopertis extends CActiveRecord
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
		return 'user_kopertis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_KOPERTIS, EMAIL, NAMA, PASSWORD, PASSWORD_REPEAT, TAHUN, ROLE, TANGGAL_UPDATE', 'required','on'=>'create,daftar-baru,update-biodata'),
			array('ID_KOPERTIS, ROLE, STATUS, VERIFIKATOR', 'numerical', 'integerOnly'=>true),
			array('EMAIL, NAMA', 'length', 'max'=>100),
			array('PASSWORD, TOKEN', 'length', 'max'=>50),
			array('TAHUN', 'length', 'max'=>4),
			array('HP, TELP', 'length', 'max'=>20),
			array('TANGGAL_INPUT', 'safe'),
			array('EMAIL','checkUniqueEmail','on'=>'daftar-baru,update-biodata'),
			array('EMAIL','checkEmailLupaPassword','on'=>'lupa-password'),
			array('ID_KOPERTIS, EMAIL', 'required', 'on'=>'lupa-password'),
			array('NEW_PASSWORD, PASSWORD_REPEAT','required','on'=>'reset-password'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'NEW_PASSWORD','on'=>'reset-password','message'=>'Password tidak cocok'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'PASSWORD','on'=>'create','message'=>'Password tidak cocok'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USER, ID_KOPERTIS, EMAIL, PASSWORD, TOKEN, TAHUN, ROLE, NAMA, HP, TELP, STATUS, VERIFIKATOR, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe', 'on'=>'search'),
		);
	}

	public function checkEmailLupaPassword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_KOPERTIS=:pt AND TAHUN=:tahun';
		$criteria->params = array(
			':pt'=>$this->ID_KOPERTIS,
			':tahun'=>Yii::app()->params['tahun']
		);

		$model = self::model()->find($criteria);

		if($model!==null){
			if($this->EMAIL!==$model->EMAIL)
				$this->addError('EMAIL','Email yang Anda masukkan tidak sesuai dengan email yang Anda gunakan pada saat mendaftar.');
		}else{
			$this->addError('ID_KOPERTIS','Perguruan tinggi belum terdaftar. Silahkan mendaftar terlebih dahulu.');
		}
	}

	public function checkUniqueEmail($attribute,$params){
		$criteria = new CDbCriteria;
		$criteria->condition = 'EMAIL=:email AND TAHUN=:tahun';
		$criteria->params = array(
			':email'=>$this->EMAIL,
			':tahun'=>$this->TAHUN
		);

		$model = self::model()->find($criteria);

		if($model!==null && $model->EMAIL!=Yii::app()->user->getState('email')){
			$this->addError('EMAIL','Email '.$this->EMAIL.' sudah terdaftar untuk user dengan nama '.$model->Kopertis->NAMA);
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
			'Kopertis' => array(self::BELONGS_TO, 'MasterKopertis', 'ID_KOPERTIS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USER' => 'Id User',
			'ID_KOPERTIS' => 'Kopertis',
			'EMAIL' => 'Email',
			'PASSWORD' => 'Password',
			'TAHUN' => 'Tahun',
			'ROLE' => 'Role',
			'NAMA' => 'Nama',
			'HP' => 'Hp',
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

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ID_KOPERTIS',$this->ID_KOPERTIS);
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
	 * @return UserKopertis the static model class
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
			self::PENDING=>'Pending'
		);
	}

	public function getUpdateButton(){
		$update =  CHtml::link('<i class="fa fa-pencil"></i> Koreksi',array('user/update','type'=>WebUser::ROLE_KOPERTIS,'id'=>$this->ID_USER),array(
			'class'=>'btn btn-sm btn-success',
		));

		$button = $update;

		return $button;
	}

	public function getDeleteButton(){
		$delete =  CHtml::link('<i class="fa fa-trash"></i> Hapus','#',array(
			'class'=>'btn btn-sm red',
			'submit'=>array('user/delete','type'=>WebUser::ROLE_KOPERTIS,'id'=>$this->ID_USER),
			'confirm'=>'Anda akan menghapus user ini. Apakah Anda ingin melanjutkan?'
		));

		$button = $delete;

		return $button;
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
				<h3>Hello, ' . $this->Kopertis->NAMA.'</h3>
				<p>Untuk reset password Anda, silahkan klik tautan berikut ini:</p>
				<a href="http://pilmapres.ristekdikti.go.id/kopertis/default/resetpassword/ref/'.$this->TOKEN.'">RESET PASSWORD</a>
				<p>Terima kasih.</p>
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
	}

	public function hasNoCandidate(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_USER=:id_user AND ROLE_USER=:role';
		$criteria->params = array(
			':id_user'=>$this->ID_USER,
			':role'=>$this->ROLE
		);

		$peserta = Peserta::model()->count($criteria);

		return $peserta==0;
	}
}
