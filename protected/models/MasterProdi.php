<?php

/**
 * This is the model class for table "master_prodi".
 *
 * The followings are the available columns in table 'master_prodi':
 * @property integer $KODE_PRODI
 * @property string $NAMA_PRODI
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Peserta[] $pesertas
 */
class MasterProdi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_prodi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA_PRODI', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('NAMA_PRODI', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KODE_PRODI, NAMA_PRODI, STATUS', 'safe', 'on'=>'search'),
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
			'pesertas' => array(self::HAS_MANY, 'Peserta', 'ID_PRODI'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KODE_PRODI' => 'Kode Prodi',
			'NAMA_PRODI' => 'Nama Prodi',
			'STATUS' => 'Status',
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

		$criteria->compare('KODE_PRODI',$this->KODE_PRODI);
		$criteria->compare('NAMA_PRODI',$this->NAMA_PRODI,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterProdi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
