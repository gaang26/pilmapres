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

	public $PASSWORD_REPEAT;
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
			array('ID_PT, EMAIL', 'required', 'on'=>'lupa-password'),
			array('ID_PT, ROLE, STATUS, VERIFIKATOR', 'numerical', 'integerOnly'=>true),
			array('EMAIL, NAMA', 'length', 'max'=>100),
			array('PASSWORD', 'length','min'=>6, 'max'=>50),
			array('TAHUN', 'length', 'max'=>4),
			array('HP, TELP', 'length', 'max'=>20),
			array('TANGGAL_INPUT', 'safe'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'PASSWORD','on'=>'daftar-baru','message'=>'Password tidak cocok'),
			array('EMAIL,TAHUN','checkUniqueEmail','on'=>'daftar-baru'),
			array('ID_PT,TAHUN','checkUniquePT','on'=>'daftar-baru'),
			array('EMAIL','checkEmailLupaPassword','on'=>'lupa-password'),
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
		$criteria->condition = 'ID_PT=:pt AND TAHUN=:tahun';
		$criteria->params = array(
			':pt'=>$this->ID_PT,
			':tahun'=>$this->TAHUN
		);

		$model = self::model()->find($criteria);

		if($model!==null){
			$this->addError('ID_PT','Perguruan tinggi sudah terdaftar pada tanggal '.$model->TANGGAL_INPUT.' dengan email '.$model->EMAIL);
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

		if($model!==null){
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
        // To send HTML mail, the Content-type header must be set
        /*$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . Yii::app()->params['adminEmail'] . "\r\n";
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;*/

        Yii::import('application.extensions.MandrillApp.src.Mandrill', true);
        $mandrill = new Mandrill(MyMandrill::API_KEY);

        try{
            $message = array(
                'subject' => $subject,
                'html' => $message, // or just use 'html' to support HTMl markup
                'from_email' => Yii::app()->params['adminEmail'],
                'from_name' => 'Mawapres Nasional', //optional
                'to' => array(
                    array(
                        'email' => $this->EMAIL,
                        //'name' => 'Recipient Name', // optional
                        'type' => 'to' //optional. Default is 'to'. Other options: cc & bcc
                    )
                ),
                'track_opens'=>TRUE,
                /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
                  'track_clicks' => TRUE) go here */
            );

            $result = $mandrill->messages->send($message);
        } catch(Mandrill_Error $e) {
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            throw $e;
        }
	}

	public function sendEmailLupaPassword(){
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
				<p>Username : ' . $this->EMAIL . '</br>
				<p>Password : ' . $this->PASSWORD . '</p>
				<p>Anda dapat login ke sistem mawapres dengan menggunakan password diatas setelah kami melakukan verifikasi data Anda</p>
				<p>Anda akan diverifikasi maksimal dalam waktu 1 x 24 jam pada hari dan jam kerja.</p>
				<p>Hari Kerja Senin-Jumat<br>Jam Kerja 08.00-17.00</p>
			</body>
		</html>
		';
        $subject = "Pendaftaran Mawapres Tahun ".Yii::app()->params['tahun'];

		// Begin: proses pengiriman email menggunakan mandrill
        Yii::import('application.extensions.MandrillApp.src.Mandrill', true);
        $mandrill = new Mandrill(MyMandrill::API_KEY);

        try{
            $message = array(
                'subject' => $subject,
                'html' => $message, // or just use 'html' to support HTMl markup
                'from_email' => Yii::app()->params['adminEmail'],
                'from_name' => 'Mawapres Nasional', //optional
                'to' => array(
                    array(
                        'email' => $this->EMAIL,
                        //'name' => 'Recipient Name', // optional
                        'type' => 'to' //optional. Default is 'to'. Other options: cc & bcc
                    )
                ),
                'track_opens'=>TRUE,
                /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
                  'track_clicks' => TRUE) go here */
            );

            $result = $mandrill->messages->send($message);
        } catch(Mandrill_Error $e) {
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            throw $e;
        }
		// End: proses pengiriman email menggunakan mandrill

		// Begin: proses pengiriman menggunakan sendpulse
		Yii::import('application.extensions.SendPulse.SmtpApi', true);
		$sPubKey = '
		MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDsu165g+8V7c5cWhPGmTRMbwSq
		ZbRf2PpmTd6Va4XaRnuhYxugQNcewt+tvuFVqkI8Yj5ONXnfsuym0wVtOjD1F8Oe
		QMr5mxuIWsFqU4qLn3tSYeotVeq4zC3RME5hsKTUBGuD4vrawP9NpwTct9p3JVGA
		8LwjSIWMWeTEJbk7MwIDAQAB
		';

		$oApi = new SmtpApi($sPubKey);
		$aEmail = array(
		    'html' => $message,
		    //'text' => 'Email message text',
		    'encoding' => 'UTF-8',
		    'subject' => $subject,
		    'from' => array(
		        'name' => 'Mawapres Sistem',
		        'email' => 'klicethol@gmail.com',
		    ),
		    'to' => array(
		        array(
		            'email' => $this->EMAIL
		        ),
		    )
		);
		$res = $oApi->send_email($aEmail);
		if ($res['error']){ // check if operation succeeds
		    die('Error: ' . $res['text']);
		} else {
		    // success
		}
		// End: proses pengiriman menggunakan sendpulse
	}

}
