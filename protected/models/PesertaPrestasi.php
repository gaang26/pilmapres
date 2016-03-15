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
			array('ID_PRESTASI, ID_PESERTA, NAMA_PRESTASI, PENCAPAIAN, TAHUN, JENIS, LEMBAGA, TINGKAT', 'required'),
			array('ID_PRESTASI, ID_PESERTA, JENIS, TINGKAT, PRIORITAS', 'numerical', 'integerOnly'=>true),
			array('NAMA_PRESTASI, LEMBAGA', 'length', 'max'=>100),
			array('PENCAPAIAN', 'length', 'max'=>50),
			array('TAHUN', 'length', 'max'=>4),
			array('SERTIFIKAT', 'length', 'max'=>255),
			array('TANGGAL_INPUT', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PRESTASI, ID_PESERTA, NAMA_PRESTASI, PENCAPAIAN, TAHUN, JENIS, LEMBAGA, TINGKAT, SERTIFIKAT, PRIORITAS, TANGGAL_INPUT', 'safe', 'on'=>'search'),
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
			'iDPESERTA' => array(self::BELONGS_TO, 'Peserta', 'ID_PESERTA'),
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
			'NAMA_PRESTASI' => 'Nama Prestasi',
			'PENCAPAIAN' => 'Pencapaian',
			'TAHUN' => 'Tahun',
			'JENIS' => 'Jenis',
			'LEMBAGA' => 'Lembaga',
			'TINGKAT' => 'Tingkat',
			'SERTIFIKAT' => 'Sertifikat',
			'PRIORITAS' => 'Prioritas',
			'TANGGAL_INPUT' => 'Tanggal Input',
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
}
