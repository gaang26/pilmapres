<?php

/**
 * This is the model class for table "peserta_prestasi".
 *
 * The followings are the available columns in table 'peserta_prestasi':
 * @property integer $ID_PRESTASI
 * @property integer $ID_PESERTA
 * @property string $NAMA_PRESTASI
 * @property string $PENCAPAIAN
 * @property string $TAHUN
 * @property integer $JENIS
 * @property string $LEMBAGA
 * @property integer $TINGKAT
 * @property string $SERTIFIKAT
 * @property integer $PRIORITAS
 * @property string $TANGGAL_INPUT
 *
 * The followings are the available model relations:
 * @property Peserta $iDPESERTA
 */
class PesertaPrestasi extends CActiveRecord
{
	const PENCAPAIAN_JUARA_1='Juara 1';
	const PENCAPAIAN_JUARA_2='Juara 2';
	const PENCAPAIAN_JUARA_3='Juara 3';
	const PENCAPAIAN_LAINNYA='Lainnya';

	const TINGKAT_INTERNASIONAL = 1;
	const TINGKAT_NASIONAL = 2;
	const TINGKAT_PROPINSI = 3;
	const TINGKAT_REGIONAL = 4;

	const JENIS_INDIVIDU = 1;
	const JENIS_KELOMPOK = 2;

	const MAKS_PRESTASI = 10;
	public $OTHERS;
	public $FILE_SERTIFIKAT;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peserta_prestasi';
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
                'FILE_SERTIFIKAT',
                'file',
				'types'=>'jpg,jpeg,png',
				'on'=>'new-prestasi',
				'maxSize'=>1024 * 1024 * 1,//1MB
				'tooLarge'=>'Ukuran maksimal 1 MB',
                'allowEmpty'=>true,
				//'message'=>'Sertifikat tidak boleh dikosongkan',
			),
			array(
                'FILE_SERTIFIKAT',
                'file',
				'types'=>'jpg,jpeg,png',
				'on'=>'edit-prestasi',
				'maxSize'=>1024 * 1024 * 1,//1MB
				'tooLarge'=>'Ukuran maksimal 1 MB',
                'allowEmpty'=>true,
				//'message'=>'Sertifikat tidak boleh dikosongkan',
			),
			array('ID_PRESTASI, ID_PESERTA, NAMA_PRESTASI, PENCAPAIAN, TAHUN, JENIS, LEMBAGA, TINGKAT, OTHERS, PRIORITAS', 'required','on'=>'new-prestasi,edit-prestasi'),
			array('ID_PRESTASI, ID_PESERTA, JENIS, TINGKAT, PRIORITAS', 'numerical', 'integerOnly'=>true),
			array('NAMA_PRESTASI, LEMBAGA', 'length', 'max'=>100),
			array('PENCAPAIAN', 'length', 'max'=>255),
			array('TAHUN', 'length', 'max'=>4),
			array('SERTIFIKAT', 'length', 'max'=>255),
			array('TANGGAL_INPUT, KETERANGAN', 'safe'),
			array('PRIORITAS','checkUniqueOrder'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PRESTASI, ID_PESERTA, NAMA_PRESTASI, PENCAPAIAN, TAHUN, JENIS, LEMBAGA, TINGKAT, SERTIFIKAT, PRIORITAS, TANGGAL_INPUT', 'safe', 'on'=>'search'),
		);
	}

	public function checkUniqueOrder($attribute,$param){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PESERTA=:id_peserta AND PRIORITAS=:order';
		$criteria->params = array(':id_peserta'=>$this->ID_PESERTA,':order'=>$this->PRIORITAS);

		$model = self::model()->find($criteria);
		if($this->isNewRecord && $model!==null)
			$this->addError('PRIORITAS','Anda sudah memasukkan prioritas '.$this->PRIORITAS.' untuk prestasi '.$model->NAMA_PRESTASI);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Peserta' => array(self::BELONGS_TO, 'Peserta', 'ID_PESERTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PRESTASI' => 'Id Prestasi',
			'ID_PESERTA' => 'Id Peserta',
			'NAMA_PRESTASI' => 'Nama Prestasi/Kemampuan yg Diunggulkan',
			'PENCAPAIAN' => 'Pencapaian/Penghargaan/Pengakuan',
			'OTHERS'=>'Masukkan pencapaian/penghargaan/pengakuan lainnya',
			'TAHUN' => 'Tahun Perolehan',
			'JENIS' => 'Individu/Kelompok',
			'LEMBAGA' => 'Lembaga Pemberi/Event',
			'TINGKAT' => 'Tingkat',
			'SERTIFIKAT' => 'Sertifikat Prestasi',
			'FILE_SERTIFIKAT' => 'Sertifikat Prestasi',
			'PRIORITAS' => 'Prioritas',
			'TANGGAL_INPUT' => 'Tanggal Input',
			'KETERANGAN'=>'Keterangan Tambahan',
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

		$criteria->compare('ID_PRESTASI',$this->ID_PRESTASI);
		$criteria->compare('ID_PESERTA',$this->ID_PESERTA);
		$criteria->compare('NAMA_PRESTASI',$this->NAMA_PRESTASI,true);
		$criteria->compare('PENCAPAIAN',$this->PENCAPAIAN,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('JENIS',$this->JENIS);
		$criteria->compare('LEMBAGA',$this->LEMBAGA,true);
		$criteria->compare('TINGKAT',$this->TINGKAT);
		$criteria->compare('SERTIFIKAT',$this->SERTIFIKAT,true);
		$criteria->compare('PRIORITAS',$this->PRIORITAS);
		$criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PesertaPrestasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateID(){
		$post = rand(1,999);
		if(strlen($post)==1)
			$post = '00'.$post;
		else if(strlen($post)==2)
			$post = '0'.$post;
		else
			$post = $post;

		$id = str_replace(' ', '', $this->ID_PESERTA.$post);
		return $id;
	}

	public function isAvailable(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'ID_PESERTA=:id_peserta';
		$criteria->params = array(':id_peserta'=>$this->ID_PESERTA);
		$count = self::model()->count($criteria);

		return $count<self::MAKS_PRESTASI;
	}
	public static function optionsPencapaian(){
		return array(
			self::PENCAPAIAN_JUARA_1=>'Juara 1',
			self::PENCAPAIAN_JUARA_2=>'Juara 2',
			self::PENCAPAIAN_JUARA_3=>'Juara 3',
			self::PENCAPAIAN_LAINNYA=>'Lainnya',
		);
	}
	public static function optionsTingkat(){
		return array(
			self::TINGKAT_INTERNASIONAL =>'Internasional',
			self::TINGKAT_NASIONAL =>'Nasional',
			self::TINGKAT_PROPINSI =>'Propinsi',
			self::TINGKAT_REGIONAL =>'Regional',
		);
	}
	public static function optionsJenis(){
		return array(
			self::JENIS_INDIVIDU=>'Individu',
			self::JENIS_KELOMPOK=>'Kelompok',
		);
	}
	public static function optionsTahun(){
		$tahun = [];
		for($i=date('Y');$i>=2000;$i--){
			$tahun[$i] = $i;
		}
		return $tahun;
	}
	public static function optionsPrioritas(){
		$prioritas = [];
		for($i=1;$i<=10;$i++){
			$prioritas[$i] = $i;
		}
		return $prioritas;
	}
	public function getLabelJenis(){
		if($this->JENIS==self::JENIS_INDIVIDU)
			return '<span class="label label-success">Individu</span>';
		else
			return '<span class="label label-success">Kelompok</span>';;
	}
	public function getLabelTingkat(){
		switch ($this->TINGKAT) {
			case self::TINGKAT_INTERNASIONAL:
				return '<span class="label label-important">Internasional</span>';
				break;
			case self::TINGKAT_NASIONAL:
				return '<span class="label label-info">Nasional</span>';;
				break;
			case self::TINGKAT_PROPINSI:
				return '<span class="label label-warning">Propinsi</span>';;
				break;
			case self::TINGKAT_REGIONAL:
				return '<span class="label">Regional</span>';;
				break;
		}
	}

	public function getSertifikat(){
		$photopath = Yii::app()->basePath . '/../file/prestasi/'.Yii::app()->params['tahun'].'/' . $this->SERTIFIKAT;
		if($this->SERTIFIKAT!=null && $this->SERTIFIKAT!='' && file_exists($photopath)){
			$photourl = Yii::app()->request->baseUrl.'/file/prestasi/'.Yii::app()->params['tahun'].'/'.$this->SERTIFIKAT;
			return '<img src="'.$photourl.'" alt="Photo"/>';
		}else{
			return 'TIDAK ADA SERTIFIKAT';
		}
	}
}
