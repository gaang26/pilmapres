<?php

/**
 * This is the model class for table "master_kota".
 *
 * The followings are the available columns in table 'master_kota':
 * @property integer $ID_KOTA
 * @property integer $ID_PROVINSI
 * @property string $NAMA_KOTA
 *
 * The followings are the available model relations:
 * @property MasterProvinsi $iDPROVINSI
 * @property Peserta[] $pesertas
 */
class MasterKota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_kota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_KOTA, ID_PROVINSI, NAMA_KOTA', 'required'),
			array('ID_KOTA, ID_PROVINSI', 'numerical', 'integerOnly'=>true),
			array('NAMA_KOTA', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_KOTA, ID_PROVINSI, NAMA_KOTA', 'safe', 'on'=>'search'),
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
			'Provinsi' => array(self::BELONGS_TO, 'MasterProvinsi', 'ID_PROVINSI'),
			'Peserta' => array(self::HAS_MANY, 'Peserta', 'ID_KOTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_KOTA' => 'Id Kota',
			'ID_PROVINSI' => 'Id Provinsi',
			'NAMA_KOTA' => 'Nama Kota',
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

		$criteria->compare('ID_KOTA',$this->ID_KOTA);
		$criteria->compare('ID_PROVINSI',$this->ID_PROVINSI);
		$criteria->compare('NAMA_KOTA',$this->NAMA_KOTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterKota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function optionsAll(){
		$model = self::model()->findAll();

		$kota = [];
		foreach ($model as $data) {
			$kota[$data->ID_KOTA] = $data->NAMA_KOTA.', '.$data->Provinsi->NAMA_PROVINSI;
		}

		return $kota;
	}
}
