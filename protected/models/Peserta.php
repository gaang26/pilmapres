<?php

/**
 * This is the model class for table "peserta".
 *
 * The followings are the available columns in table 'peserta':
 * @property integer $ID_PESERTA
 * @property integer $ID_PT
 * @property integer $ROLE
 * @property string $PIN
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
 * @property integer $ID_TOPIK
 * @property string $BIDANG
 * @property string $RINGKASAN
 * @property string $VIDEO_RINGKASAN
 * @property string $VIDEO_KESEHARIAN
 * @property string $SURAT_PENGANTAR
 * @property string $URL_FORLAP
 * @property string $KTM
 * @property integer $ID_USER
 * @property integer $ROLE_PENDAFTAR
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
			array('ID_PT, ROLE, PIN, TAHUN, NIM, NAMA, ID_PRODI, JENJANG, SEMESTER', 'required'),
			array('ID_PT, ROLE, ID_PRODI, SEMESTER, ID_KOTA, ID_TOPIK, ID_USER, ROLE_PENDAFTAR, TAHAP_AWAL', 'numerical', 'integerOnly'=>true),
			array('PIN, BIDANG', 'length', 'max'=>10),
			array('TAHUN', 'length', 'max'=>4),
			array('NIM, TEMPAT_LAHIR', 'length', 'max'=>50),
			array('NAMA, EMAIL, WEBSITE', 'length', 'max'=>100),
			array('JENJANG', 'length', 'max'=>15),
			array('IPK', 'length', 'max'=>2),
			array('HP', 'length', 'max'=>20),
			array('PHOTO, JUDUL_KTI, VIDEO_RINGKASAN, VIDEO_KESEHARIAN, SURAT_PENGANTAR, URL_FORLAP, KTM', 'length', 'max'=>255),
			array('TANGGAL_LAHIR, ALAMAT, RINGKASAN, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PESERTA, ID_PT, ROLE, PIN, TAHUN, NIM, NAMA, ID_PRODI, JENJANG, SEMESTER, IPK, EMAIL, HP, TEMPAT_LAHIR, TANGGAL_LAHIR, ALAMAT, ID_KOTA, WEBSITE, PHOTO, JUDUL_KTI, ID_TOPIK, BIDANG, RINGKASAN, VIDEO_RINGKASAN, VIDEO_KESEHARIAN, SURAT_PENGANTAR, URL_FORLAP, KTM, ID_USER, ROLE_PENDAFTAR, TANGGAL_INPUT, TANGGAL_UPDATE, TAHAP_AWAL', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'iDKOTA' => array(self::BELONGS_TO, 'MasterKota', 'ID_KOTA'),
			'iDTOPIK' => array(self::BELONGS_TO, 'MasterTopik', 'ID_TOPIK'),
			'iDPT' => array(self::BELONGS_TO, 'MasterPt', 'ID_PT'),
			'iDPRODI' => array(self::BELONGS_TO, 'MasterProdi', 'ID_PRODI'),
			'pesertaPrestasis' => array(self::HAS_MANY, 'PesertaPrestasi', 'ID_PESERTA'),
			'masterSosialMedias' => array(self::MANY_MANY, 'MasterSosialMedia', 'peserta_sosial_media(ID_PESERTA, ID_SOSIAL_MEDIA)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PESERTA' => 'Id Peserta',
			'ID_PT' => 'Id Pt',
			'ROLE' => 'Role',
			'PIN' => 'Pin',
			'TAHUN' => 'Tahun',
			'NIM' => 'Nim',
			'NAMA' => 'Nama',
			'ID_PRODI' => 'Id Prodi',
			'JENJANG' => 'Jenjang',
			'SEMESTER' => 'Semester',
			'IPK' => 'Ipk',
			'EMAIL' => 'Email',
			'HP' => 'Hp',
			'TEMPAT_LAHIR' => 'Tempat Lahir',
			'TANGGAL_LAHIR' => 'Tanggal Lahir',
			'ALAMAT' => 'Alamat',
			'ID_KOTA' => 'Id Kota',
			'WEBSITE' => 'Website',
			'PHOTO' => 'Photo',
			'JUDUL_KTI' => 'Judul Kti',
			'ID_TOPIK' => 'Id Topik',
			'BIDANG' => 'Bidang',
			'RINGKASAN' => 'Ringkasan',
			'VIDEO_RINGKASAN' => 'Video Ringkasan',
			'VIDEO_KESEHARIAN' => 'Video Keseharian',
			'SURAT_PENGANTAR' => 'Surat Pengantar',
			'URL_FORLAP' => 'Url Forlap',
			'KTM' => 'Ktm',
			'ID_USER' => 'Id User',
			'ROLE_PENDAFTAR' => 'Role Pendaftar',
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
		$criteria->compare('ROLE_PENDAFTAR',$this->ROLE_PENDAFTAR);
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
}
