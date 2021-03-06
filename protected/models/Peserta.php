<?php

/**
 * This is the model class for table "peserta".
 *
 * The followings are the available columns in table 'peserta':
 * @property integer $ID_PESERTA
 * @property integer $ID_PT
 * @property integer $ROLE
 * @property string $PIN
 * @property string $PASSWORD
 * @property string $TAHUN
 * @property string $NIM
 * @property string $NAMA
 * @property integer $ID_PRODI
 * @property string $JENJANG
 * @property integer $SEMESTER
 * @property string $IPK
 * @property string $EMAIL
 * @property string $HP
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property string $ALAMAT
 * @property integer $ID_KOTA
 * @property string $WEBSITE
 * @property string $PHOTO
 * @property string $JUDUL_KTI
 * @property string $FILE_KTI
 * @property integer $ID_TOPIK
 * @property string $BIDANG
 * @property string $RINGKASAN
 * @property string $VIDEO_RINGKASAN
 * @property string $VIDEO_KESEHARIAN
 * @property string $SURAT_PENGANTAR
 * @property string $URL_FORLAP
 * @property string $KTM
 * @property integer $ID_USER
 * @property integer $ROLE_USER
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 * @property integer $TAHAP_AWAL
 *
 * The followings are the available model relations:
 * @property MasterKota $iDKOTA
 * @property MasterTopik $iDTOPIK
 * @property MasterPt $iDPT
 * @property MasterProdi $iDPRODI
 * @property PesertaPrestasi[] $pesertaPrestasis
 * @property MasterSosialMedia[] $masterSosialMedias
 */
class Peserta extends CActiveRecord
{
	const SARJANA = 'SARJANA';
	const DIPLOMA = 'DIPLOMA';

	const MALE = 'L';
	const FEMALE = 'P';

	const BIDANG_IPA = 'IPA';
	const BIDANG_IPS = 'IPS';
	const BIDANG_TERAPAN = 'TERAPAN';

	const LOLOS = 1;
	const TIDAK_LOLOS = 0;

	public $PASSWORD_REPEAT;
	public $NEW_PASSWORD;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peserta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
                'FILE_KTI',
                'file',
				'types'=>'pdf',
				'on'=>'update-kti-isi',
				'maxSize'=>1024 * 1024 * 10,//10Mb
				'tooLarge'=>'Ukuran maksimal 10 MB',
                'allowEmpty'=>false,
				'message'=>'File karya tulis ilmiah tidak boleh dikosongkan',
			),
			array(
                'FILE_KTI',
                'file',
				'types'=>'pdf',
				'on'=>'update-kti-edit',
				'maxSize'=>1024 * 1024 * 10,//10Mb
				'tooLarge'=>'Ukuran maksimal 10 MB',
                'allowEmpty'=>true,
			),
			array(
                'PHOTO',
                'file',
				'types'=>'jpg,jpeg,png',
				'on'=>'update-profil',
				'maxSize'=>1024 * 300 * 1,//300KB
				'tooLarge'=>'Ukuran maksimal 300 KB',
                'allowEmpty'=>true,
			),

			array(
                'KTM',
                'file',
				'types'=>'jpg,jpeg,png',
				'on'=>'update-profil',
				'maxSize'=>1024 * 100 * 1,//300KB
				'tooLarge'=>'Ukuran maksimal 100 KB',
                'allowEmpty'=>true,
			),

			array(
                'SURAT_PENGANTAR',
                'file',
				'types'=>'jpg,jpeg,png',
				'on'=>'update-profil',
				'maxSize'=>1024 * 300 * 1,//300KB
				'tooLarge'=>'Ukuran maksimal 300 KB',
                'allowEmpty'=>true,
			),

			array('ID_PT, ROLE, PIN, TAHUN, NIM, NAMA, ID_PRODI, JENJANG, SEMESTER, EMAIL, PASSWORD', 'required','on'=>'daftar'),
			array('NIM, NAMA, ID_PRODI, JENJANG, SEMESTER, EMAIL, HP, EMAIL, ALAMAT, ID_KOTA, JENIS_KELAMIN, TEMPAT_LAHIR, TANGGAL_LAHIR,IPK', 'required','on'=>'update-profil'),
			array('JUDUL_KTI, BIDANG, ID_TOPIK, RINGKASAN', 'required', 'on'=>'update-kti-isi,update-kti-edit'),
			//array('VIDEO_RINGKASAN','required','on'=>'update-video'),
			array('EMAIL', 'required', 'on'=>'lupa-password'),
			array('EMAIL','checkEmailLupaPassword','on'=>'lupa-password'),
			array('ID_PT, ROLE, ID_PRODI, SEMESTER, ID_KOTA, ID_TOPIK, ID_USER, ROLE_USER, TAHAP_AWAL', 'numerical', 'integerOnly'=>true),
			array('PIN, BIDANG', 'length', 'max'=>10),
			array('TAHUN', 'length', 'max'=>4),
			array('NIM, TEMPAT_LAHIR, PASSWORD', 'length', 'max'=>50),
			array('NAMA, EMAIL, WEBSITE', 'length', 'max'=>100),
			array('JENJANG', 'length', 'max'=>15),
			array('JENIS_KELAMIN', 'length', 'max'=>1),
			array('IPK', 'length', 'max'=>4),
			array('IPK', 'numerical', 'numberPattern' => "/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/"),
			array('HP', 'length', 'max'=>20),
			array('JUDUL_KTI', 'length', 'max'=>500),
			array('PHOTO, VIDEO_RINGKASAN, VIDEO_KESEHARIAN, SURAT_PENGANTAR, URL_FORLAP, KTM', 'length', 'max'=>255),
			array('TANGGAL_LAHIR, ALAMAT, RINGKASAN, TANGGAL_INPUT, TANGGAL_UPDATE,FILE_KTI', 'safe'),
			array('TANGGAL_LAHIR','validateAge','on'=>'update-profil'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PESERTA, ID_PT, ROLE, PIN, TAHUN, NIM, NAMA, ID_PRODI, JENJANG, SEMESTER, IPK, EMAIL, HP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, ID_KOTA, WEBSITE, PHOTO, JUDUL_KTI, ID_TOPIK, BIDANG, RINGKASAN, VIDEO_RINGKASAN, VIDEO_KESEHARIAN, SURAT_PENGANTAR, URL_FORLAP, KTM, ID_USER, ROLE_USER, TANGGAL_INPUT, TANGGAL_UPDATE, TAHAP_AWAL', 'safe', 'on'=>'search'),
		);
	}

	public function validateAge($attribute,$params){
		$max = 22;
		$dob = new DateTime($this->TANGGAL_LAHIR);
		$now = new DateTime('2017-01-01');
		$age = $now->diff($dob)->y;
		if($age > $max){
			return $this->addError('TANGGAL_LAHIR','Usia Anda melebihi batas persyaratan yang telah ditentukan. Usia Anda: '.$age);
		}
	}

	public function checkEmailLupaPassword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'EMAIL=:email AND TAHUN=:tahun';
		$criteria->params = array(
			':email'=>$this->EMAIL,
			':tahun'=>Yii::app()->params['tahun']
		);

		$model = self::model()->find($criteria);

		if($model===null){
			$this->addError('EMAIL','Email yang Anda masukkan tidak ditemukan.');
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
			'Kota' => array(self::BELONGS_TO, 'MasterKota', 'ID_KOTA'),
			'Topik' => array(self::BELONGS_TO, 'MasterTopik', 'ID_TOPIK'),
			'PT' => array(self::BELONGS_TO, 'MasterPT', 'ID_PT'),
			'Prodi' => array(self::BELONGS_TO, 'MasterProdi', 'ID_PRODI'),
			'Prestasi' => array(self::HAS_MANY, 'PesertaPrestasi', 'ID_PESERTA'),
			'SosialMedia' => array(self::HAS_MANY, 'PesertaSosialMedia', 'ID_PESERTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PESERTA' => 'Id Peserta',
			'ID_PT' => 'Asal Perguruan Tinggi',
			'ROLE' => 'Role',
			'PIN' => 'PIN',
			'TAHUN' => 'Tahun',
			'NIM' => 'NIM/NPM',
			'NAMA' => 'Nama Peserta',
			'ID_PRODI' => 'Program Studi/Jurusan',
			'JENJANG' => 'Jenjang',
			'SEMESTER' => 'Semester',
			'IPK' => 'IPK',
			'EMAIL' => 'Email Peserta',
			'HP' => 'HP',
			'TEMPAT_LAHIR' => 'Tempat Lahir',
			'TANGGAL_LAHIR' => 'Tanggal Lahir',
			'ALAMAT' => 'Alamat',
			'ID_KOTA' => 'Kota',
			'WEBSITE' => 'Website',
			'PHOTO' => 'Foto Profil Peserta',
			'JUDUL_KTI' => 'Judul Karya Tulis',
			'FILE_KTI' => 'File Karya Tulis',
			'ID_TOPIK' => 'Topik Karya Tulis',
			'BIDANG' => 'Bidang Karya Tulis',
			'RINGKASAN' => 'Ringkasan Karya Tulis Dalam Bahasa Asing (Bukan Abstrak)',
			'VIDEO_RINGKASAN' => 'Video Kemampuan Bahasa Inggris',
			'VIDEO_KESEHARIAN' => 'Video Keseharian',
			'SURAT_PENGANTAR' => 'Scan Surat Pengantar',
			'URL_FORLAP' => 'URL Forlap',
			'KTM' => 'Scan KTM',
			'ID_USER' => 'User Pendaftar',
			'ROLE_USER' => 'Role User Pendaftar',
			'TANGGAL_INPUT' => 'Tanggal Input',
			'TANGGAL_UPDATE' => 'Tanggal Update',
			'TAHAP_AWAL' => 'Tahap Awal',
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

		$criteria->compare('ID_PESERTA',$this->ID_PESERTA);
		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('PIN',$this->PIN,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('ID_PRODI',$this->ID_PRODI);
		$criteria->compare('JENJANG',$this->JENJANG,true);
		$criteria->compare('SEMESTER',$this->SEMESTER);
		$criteria->compare('IPK',$this->IPK,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TEMPAT_LAHIR',$this->TEMPAT_LAHIR,true);
		$criteria->compare('TANGGAL_LAHIR',$this->TANGGAL_LAHIR,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('ID_KOTA',$this->ID_KOTA);
		$criteria->compare('WEBSITE',$this->WEBSITE,true);
		$criteria->compare('PHOTO',$this->PHOTO,true);
		$criteria->compare('JUDUL_KTI',$this->JUDUL_KTI,true);
		$criteria->compare('ID_TOPIK',$this->ID_TOPIK);
		$criteria->compare('BIDANG',$this->BIDANG,true);
		$criteria->compare('RINGKASAN',$this->RINGKASAN,true);
		$criteria->compare('VIDEO_RINGKASAN',$this->VIDEO_RINGKASAN,true);
		$criteria->compare('VIDEO_KESEHARIAN',$this->VIDEO_KESEHARIAN,true);
		$criteria->compare('SURAT_PENGANTAR',$this->SURAT_PENGANTAR,true);
		$criteria->compare('URL_FORLAP',$this->URL_FORLAP,true);
		$criteria->compare('KTM',$this->KTM,true);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ROLE_USER',$this->ROLE_USER);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);
		$criteria->compare('TAHAP_AWAL',$this->TAHAP_AWAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchSarjana()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'JENJANG=:sarjana AND TAHUN=:tahun';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun'],
			':sarjana'=>self::SARJANA
		);

		$criteria->compare('ID_PESERTA',$this->ID_PESERTA);
		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('PIN',$this->PIN,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('ID_PRODI',$this->ID_PRODI);
		$criteria->compare('JENJANG',$this->JENJANG,true);
		$criteria->compare('SEMESTER',$this->SEMESTER);
		$criteria->compare('IPK',$this->IPK,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TEMPAT_LAHIR',$this->TEMPAT_LAHIR,true);
		$criteria->compare('TANGGAL_LAHIR',$this->TANGGAL_LAHIR,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('ID_KOTA',$this->ID_KOTA);
		$criteria->compare('WEBSITE',$this->WEBSITE,true);
		$criteria->compare('PHOTO',$this->PHOTO,true);
		$criteria->compare('JUDUL_KTI',$this->JUDUL_KTI,true);
		$criteria->compare('ID_TOPIK',$this->ID_TOPIK);
		$criteria->compare('BIDANG',$this->BIDANG,true);
		$criteria->compare('RINGKASAN',$this->RINGKASAN,true);
		$criteria->compare('VIDEO_RINGKASAN',$this->VIDEO_RINGKASAN,true);
		$criteria->compare('VIDEO_KESEHARIAN',$this->VIDEO_KESEHARIAN,true);
		$criteria->compare('SURAT_PENGANTAR',$this->SURAT_PENGANTAR,true);
		$criteria->compare('URL_FORLAP',$this->URL_FORLAP,true);
		$criteria->compare('KTM',$this->KTM,true);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ROLE_USER',$this->ROLE_USER);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);
		$criteria->compare('TAHAP_AWAL',$this->TAHAP_AWAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchDiploma()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'JENJANG=:diploma AND TAHUN=:tahun';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun'],
			':diploma'=>self::DIPLOMA
		);

		$criteria->compare('ID_PESERTA',$this->ID_PESERTA);
		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('PIN',$this->PIN,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('NIM',$this->NIM,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('ID_PRODI',$this->ID_PRODI);
		$criteria->compare('JENJANG',$this->JENJANG,true);
		$criteria->compare('SEMESTER',$this->SEMESTER);
		$criteria->compare('IPK',$this->IPK,true);
		$criteria->compare('JENIS_KELAMIN',$this->JENIS_KELAMIN,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TEMPAT_LAHIR',$this->TEMPAT_LAHIR,true);
		$criteria->compare('TANGGAL_LAHIR',$this->TANGGAL_LAHIR,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('ID_KOTA',$this->ID_KOTA);
		$criteria->compare('WEBSITE',$this->WEBSITE,true);
		$criteria->compare('PHOTO',$this->PHOTO,true);
		$criteria->compare('JUDUL_KTI',$this->JUDUL_KTI,true);
		$criteria->compare('ID_TOPIK',$this->ID_TOPIK);
		$criteria->compare('BIDANG',$this->BIDANG,true);
		$criteria->compare('RINGKASAN',$this->RINGKASAN,true);
		$criteria->compare('VIDEO_RINGKASAN',$this->VIDEO_RINGKASAN,true);
		$criteria->compare('VIDEO_KESEHARIAN',$this->VIDEO_KESEHARIAN,true);
		$criteria->compare('SURAT_PENGANTAR',$this->SURAT_PENGANTAR,true);
		$criteria->compare('URL_FORLAP',$this->URL_FORLAP,true);
		$criteria->compare('KTM',$this->KTM,true);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ROLE_USER',$this->ROLE_USER);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
		$criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);
		$criteria->compare('TAHAP_AWAL',$this->TAHAP_AWAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Peserta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//
	public static function getPeserta($user,$role_user,$jenjang=null){
		if($role_user==WebUser::ROLE_PT){
			$criteria = new CDbCriteria;
			$criteria->condition = 'ID_USER=:user AND ROLE_USER=:role_user AND JENJANG=:jenjang AND TAHUN=:tahun';
			$criteria->params = array(
				':user'=>$user,
				':role_user'=>$role_user,
				':jenjang'=>$jenjang,
				':tahun'=>Yii::app()->params['tahun']
			);

			$model = self::model()->find($criteria);
			return $model; // return 1 result
		}else if($role_user==WebUser::ROLE_KOPERTIS){
			$criteria = new CDbCriteria;
			$criteria->condition = 'ID_USER=:user AND ROLE_USER=:role_user AND TAHUN=:tahun';
			$criteria->params = array(
				':user'=>$user,
				':role_user'=>$role_user,
				':tahun'=>Yii::app()->params['tahun']
			);

			$model = self::model()->findAll($criteria);
			return $model;
		}else{
			return null;
		}

	}

	public function generatePIN(){
		$prefix = substr($this->TAHUN,2,2);
		if($this->JENJANG==self::SARJANA){
			$jenjang = '01';
		}else{
			$jenjang = '02';
		}

		$random = rand(1000,9999);

		return $prefix.$jenjang.$random;
	}
	public function generatePassword(){
		$prefix = substr($this->TAHUN,2,2);
		if($this->JENJANG==self::SARJANA){
			$jenjang = '01';
		}else{
			$jenjang = '02';
		}

		$random = rand(1000,9999);

		$source = md5($random);
		return substr($source, 5, 6);
	}

	public static function optionsSemester($jenjang){
		$max = 6;
		if($jenjang==self::DIPLOMA){
			$max = 6;
		}

		$smt = [];
		for($i=1;$i<=$max;$i++){
			$smt[$i] = $i;
		}
		return $smt;
	}

	public static function optionsJenisKelamin(){
		return array(
			self::MALE=>'Laki-Laki',
			self::FEMALE=>'Perempuan',
		);
	}
	public static function optionsBidang(){
		return array(
			self::BIDANG_IPA=>'IPA (Alam dan Formal)',
			self::BIDANG_IPS=>'IPS (Humaniora, Sosial, dan Agama)',
			//self::BIDANG_TERAPAN=>'Terapan'
		);
	}
	public static function optionsJenjang(){
		return array(
			self::SARJANA=>self::SARJANA,
			self::DIPLOMA=>self::DIPLOMA
		);
	}

	//get get an
	public function getWilayah(){
		if($this->Kota!=null){
			return $this->Kota->NAMA_KOTA.', '.$this->Kota->Provinsi->NAMA_PROVINSI;
		}else{
			'-';
		}
	}
	public function getJenisKelamin(){
		if($this->JENIS_KELAMIN==self::MALE){
			return 'Laki-Laki';
		}else if($this->JENIS_KELAMIN==self::FEMALE){
			return 'Perempuan';
		}else{
			return '-';
		}
	}
	public function getTanggalLahir(){
		if($this->TANGGAL_LAHIR!=null || $this->TANGGAL_LAHIR!='')
			return date('d M Y',strtotime($this->TANGGAL_LAHIR));
		else
			return '-';
	}

	//is is an
	public function isKaryaTulisEmpty(){
		return $this->JUDUL_KTI==null || $this->JUDUL_KTI=='';
	}

	public function isBiodataEmpty(){
		return $this->JENIS_KELAMIN==null || $this->JENIS_KELAMIN=='';
	}

	public function isPrestasiEmpty(){
		return count($this->Prestasi)==0;
	}

	public function isVideoEmpty(){
		return $this->VIDEO_RINGKASAN==null || $this->VIDEO_RINGKASAN=='';
	}

	public function isKTMEmpty(){
		return $this->KTM==null || $this->KTM=='';
	}

	public function isPengantarEmpty(){
		return $this->SURAT_PENGANTAR==null || $this->SURAT_PENGANTAR=='';
	}

	public function isComplete(){
		//return (!$this->isKTMEmpty() && !$this->isPengantarEmpty() && !$this->isVideoEmpty() && !$this->isPrestasiEmpty() && !$this->isBiodataEmpty() && !$this->isKaryaTulisEmpty());
		return (!$this->isKTMEmpty() && !$this->isPengantarEmpty() && !$this->isPrestasiEmpty() && !$this->isBiodataEmpty() && !$this->isKaryaTulisEmpty());
	}

	public function isCompleteJuri(){
		//return (!$this->isVideoEmpty() && !$this->isPrestasiEmpty() && !$this->isBiodataEmpty() && !$this->isKaryaTulisEmpty());
		return (!$this->isPrestasiEmpty() && !$this->isBiodataEmpty() && !$this->isKaryaTulisEmpty());
	}

	public function getLabelKelengkapan(){
		$result = '';
		if($this->isComplete()){
			$result .= '<span class="label label-success"><i class="fa fa-check"></i> Complete.</span>';
		}else{
			$result .= '<span class="label label-danger"><i class="fa fa-remove"></i> Incomplete.</span>';
		}

		$result .= '<div class="margin-bottom-10"></div>';

		$result .= '<ul class="list-unstyled">';

		if(!$this->isKTMEmpty()){
			$result .= '<li><i class="fa fa-check"></i> KTM</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> KTM</li>';
		}

		if(!$this->isPengantarEmpty()){
			$result .= '<li><i class="fa fa-check"></i> Pengantar</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> Pengantar</li>';
		}

		if(!$this->isBiodataEmpty()){
			$result .= '<li><i class="fa fa-check"></i> Biodata</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> Biodata</li>';
		}

		if(!$this->isKaryaTulisEmpty()){
			$result .= '<li><i class="fa fa-check"></i> Karya Tulis</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> Karya Tulis</li>';
		}

		if(!$this->isVideoEmpty()){
			$result .= '<li><i class="fa fa-check"></i> Video</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> Video</li>';
		}

		if(!$this->isPrestasiEmpty()){
			$result .= '<li><i class="fa fa-check"></i> Prestasi</li>';
		}else{
			$result .= '<li><i class="fa fa-remove"></i> Prestasi</li>';
		}

		$result .= '</ul>';

		return $result;
	}

	public function getStatusKTM(){
		if(!$this->isKTMEmpty()){
			return 'ADA';
		}else{
			return 'BELUM ADA';
		}
	}

	public function getStatusPengantar(){
		if(!$this->isPengantarEmpty()){
			return 'ADA';
		}else{
			return 'BELUM ADA';
		}
	}

	public function getStatusBiodata(){
		if(!$this->isBiodataEmpty()){
			return 'LENGKAP';
		}else{
			return 'BELUM LENGKAP';
		}
	}

	public function getStatusKaryaTulis(){
		if(!$this->isKaryaTulisEmpty()){
			return 'ADA';
		}else{
			return 'BELUM ADA';
		}
	}

	public function getStatusPrestasi(){
		if(!$this->isPrestasiEmpty()){
			return 'ADA';
		}else{
			return 'BELUM ADA';
		}
	}

	public function getStatusVideo(){
		if(!$this->isVideoEmpty()){
			return 'ADA';
		}else{
			return 'BELUM ADA';
		}
	}


	public function getPrestasi(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PESERTA=:id_peserta';
		$criteria->params = array(':id_peserta'=>$this->ID_PESERTA);
		$criteria->order = 'PRIORITAS ASC';

		$model = PesertaPrestasi::model()->findAll($criteria);

		return $model;
	}

	public function getEmbedLink($url,$width,$height)
    {
        $temp=explode('=',$url);
        if(count($temp)>1){
            $id=$temp[1];
            $embed = '<iframe width="'.$width.'" height="'.$height.'" src="http://youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
            return $embed;
        }else{
            return "<div class='alert alert-error'>Mohon masukkan URL video yang benar seperti pada contoh. Sistem tidak dapat mengenali url : ".$url."</div>";
        }
    }

	public function getPhoto($size=null){
		$photopath = Yii::app()->basePath . '/../file/foto/' . $this->PHOTO;
		if($this->PHOTO!=null && $this->PHOTO!='' && file_exists($photopath)){
			$photourl = Yii::app()->request->baseUrl.'/file/foto/'.$this->PHOTO;
			if($size!=null){
				return '<img src="'.$photourl.'" width="'.$size.'"/>';
			}else{
				return '<img src="'.$photourl.'" alt="Photo"/>';
			}
		}else{
			$photourl = Yii::app()->request->baseUrl.'/images/profilethumb.png';
			if($size!=null){ 
                                return '<img src="'.$photourl.'" width="'.$size.'"/>';
                        }else{ 
                                return '<img src="'.$photourl.'" alt="Photo"/>';
                        }
		}
	}

	public function getKTM(){
		$photopath = Yii::app()->basePath . '/../file/ktm/' . $this->KTM;
		if($this->KTM!=null && $this->KTM!='' && file_exists($photopath)){
			$photourl = Yii::app()->request->baseUrl.'/file/ktm/'.$this->KTM;
			return '<img src="'.$photourl.'" alt="file_ktm"/>';
		}else{
			$photourl = Yii::app()->request->baseUrl.'/images/profilethumb.png';
			return '<img src="'.$photourl.'" alt="file_ktm"/>';
		}
	}

	public function getPengantar(){
		$photopath = Yii::app()->basePath . '/../file/pengantar/' . $this->SURAT_PENGANTAR;
		if($this->SURAT_PENGANTAR!=null && $this->SURAT_PENGANTAR!='' && file_exists($photopath)){
			$photourl = Yii::app()->request->baseUrl.'/file/pengantar/'.$this->SURAT_PENGANTAR;
			return '<img src="'.$photourl.'" alt="file_pengantar"/>';
		}else{
			$photourl = Yii::app()->request->baseUrl.'/images/profilethumb.png';
			return '<img src="'.$photourl.'" alt="file_pengantar"/>';
		}
	}

	public function getPhotoSource(){
		$photopath = Yii::app()->basePath . '/../file/foto/' . $this->PHOTO;
		if($this->PHOTO!=null && $this->PHOTO!='' && file_exists($photopath)){
			$photourl = Yii::app()->request->baseUrl.'/file/foto/'.$this->PHOTO;
			return $photourl;
		}else{
			$photourl = Yii::app()->request->baseUrl.'/images/profilethumb.png';
			return $photourl;
		}
	}

	public function getSocialMedia($id_sosial_media){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_SOSIAL_MEDIA=:id_sosial_media AND ID_PESERTA=:peserta';
		$criteria->params = array(
			':id_sosial_media'=>$id_sosial_media,
			':peserta'=>$this->ID_PESERTA
		);

		$model = PesertaSosialMedia::model()->find($criteria);
		return $model;
	}

	public function getProdiView(){
		return $this->JENJANG.'<br>'.$this->Prodi->NAMA_PRODI.'<br> Semester: '.$this->SEMESTER;
	}

	public function getActionButton(){
		$view = CHtml::link('<i class="fa fa-search"></i>',array('peserta/view','id'=>$this->ID_PESERTA),array(
			'class'=>'btn btn-sm blue-sharp'
		));

		// $update = CHtml::link('<i class="fa fa-pencil"></i>',array('peserta/update','id'=>$this->ID_PESERTA),array(
		// 	'class'=>'btn btn-sm blue-sharp'
		// ));
		//
		// $delete = CHtml::link('<i class="fa fa-trash"></i>','#',array(
		// 	'class'=>'btn btn-sm red-intense',
		// 	'confirm'=>'Anda akan menghapus peserta ini. Apakah Anda ingin melanjutkan?',
		// 	'submit'=>array('peserta/delete','id'=>$this->ID_PESERTA)
		// ));

		$buttons = $view;
		//$buttons .= $update;
		//$buttons .= $delete;
		return $buttons;
	}

	public function sendEmailPeserta()
    {
        $to = $this->EMAIL;
        //$to = 'cethol@localhost';
        $message = '
        <html>
        <head>
          <title>Pendaftaran Peserta Mawapres '.Yii::app()->params["tahun"].'</title>
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
          <h3>Anda telah terdaftar di sistem online mawapres '.Yii::app()->params["tahun"].'.</h3>
          <p>PIN : ' .$this->PIN . '</br>
          <p>Password : ' . $this->PASSWORD . '</p>
          <p>Silahkan login ke sistem online mawapres untuk melengkapi dokumen-dokumen yang diperlukan dengan menggunakan Nomor PIN dan Password diatas.</p>
          <p>Terima kasih.</p>
        </body>
        </html>
        ';
        $subject = "Pendaftaran Peserta Mawapres";
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

        // To send HTML mail, the Content-type header must be set
        /*$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . Yii::app()->params['adminEmail'] . "\r\n";
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;*/

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
    }

	public function getUserPendaftar(){
		if($this->ROLE_USER==WebUser::ROLE_PT){
			$user = UserPT::model()->findByPk($this->ID_USER);
			return $user;
		}else if($this->ROLE_USER==WebUser::ROLE_KOPERTIS){
			$user = UserKopertis::model()->findByPk($this->ID_USER);
			return $user;
		}
	}

	public function sendEmailLupaPassword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'EMAIL=:email AND TAHUN=:tahun';
		$criteria->params = array(
			':email'=>$this->EMAIL,
			':tahun'=>Yii::app()->params['tahun']
		);
		$user = self::model()->find($criteria);
		$user->TOKEN = md5($this->ID_PESERTA.$this->EMAIL);
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
				<h3>Hello, ' . $user->NAMA.'</h3>
				<p>Untuk reset password Anda, silahkan klik tautan berikut ini:</p>
				<a href="http://mawapres.dikti.go.id/peserta/default/resetpassword/ref/'.$this->TOKEN.'">RESET PASSWORD</a>
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
	}

	public static function getJumlah($jenjang='SEMUA'){
		if($jenjang=='SEMUA'){
			$criteria = new CDbCriteria;
			$criteria->condition = 'TAHUN=:tahun';
			$criteria->params = array(
				':tahun'=>Yii::app()->params['tahun']
			);
			return self::model()->count($criteria);
		}else{
			$criteria = new CDbCriteria;
			$criteria->condition = 'JENJANG=:jenjang AND TAHUN=:tahun';
			$criteria->params = array(
				':jenjang'=>$jenjang,
				':tahun'=>Yii::app()->params['tahun']
			);
			return self::model()->count($criteria);
		}
	}

	public function getFinalis($jenjang){
		$criteria = new CDbCriteria;
		$criteria->condition = 'TAHUN=:tahun AND JENJANG=:jenjang AND TAHAP_AWAL=:lolos';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun'],
			':jenjang'=>$jenjang,
			':lolos'=>self::LOLOS
		);
		$criteria->order = 'NAMA ASC';

		return self::model()->findAll($criteria);
	}

    public static function getPesertaFinalis($jenjang){
        $criteria = new CDbCriteria;
        $criteria->condition = 'TAHUN=:tahun AND JENJANG=:jenjang AND TAHAP_AWAL=:lolos';
        $criteria->params = array(
            ':tahun'=>Yii::app()->params['tahun'],
            ':jenjang'=>$jenjang,
            ':lolos'=>self::LOLOS
        );
        $criteria->order = 'NAMA ASC';

        return self::model()->findAll($criteria);
    }

	public function getJuara($jenjang){
		$criteria = new CDbCriteria;
		$criteria->condition = 'TAHUN=:tahun AND JENJANG=:jenjang AND JUARA>0';
		$criteria->params = array(
			':tahun'=>Yii::app()->params['tahun'],
			':jenjang'=>$jenjang,
		);
		$criteria->order = 'JUARA ASC';

		return self::model()->findAll($criteria);
	}

	public function getKomentar($bidang){
		$criteria = new CDbCriteria;
		$criteria->condition = 'BIDANG=:bidang AND ID_PESERTA=:peserta AND STATUS=:status';
		$criteria->params = array(
			':bidang'=>$bidang,
			':peserta'=>$this->ID_PESERTA,
			':status'=>1
		);
		$criteria->order = 'TANGGAL_INPUT DESC';

		$model = Komentar::model()->findAll($criteria);
		return $model;
	}

	// public static function getJuara($tahun=false){
	// 	$juara = array();
	//
	// 	$juara['2016']['sarjana']['1'] = '16017569';
	// 	$juara['2016']['sarjana']['2'] = '16018556';
	// 	$juara['2016']['sarjana']['3'] = '16016804';
	//
	// 	$juara['2016']['diploma']['1'] = '16025353';
	// 	$juara['2016']['diploma']['2'] = '16027643';
	// 	$juara['2016']['diploma']['3'] = '16027202';
	//
	// 	return $juara;
	// }

	//
	// public function getImage(){
	// 	if($this->PHOTO==null || $this->PHOTO==''){
	// 		return Yii::app()->request->baseUrl.'/images/profilethumb.png';
	// 	}else{
	// 		if(file_exists())
	// 	}
	// }

	//
}
