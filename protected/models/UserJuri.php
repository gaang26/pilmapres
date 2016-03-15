<?php

/**
 * This is the model class for table "user_juri".
 *
 * The followings are the available columns in table 'user_juri':
 * @property integer $ID_USER
 * @property integer $ID_PT
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property integer $ROLE
 * @property integer $ID_BIDANG
 * @property string $NAMA
 * @property string $HP
 * @property integer $STATUS
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 *
 * The followings are the available model relations:
 * @property MasterPt $iDPT
 * @property MasterBidangJuri $iDBIDANG
 */
class UserJuri extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_juri';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PT, EMAIL, PASSWORD, ROLE, ID_BIDANG, TANGGAL_UPDATE', 'required'),
			array('ID_PT, ROLE, ID_BIDANG, STATUS', 'numerical', 'integerOnly'=>true),
			array('EMAIL, NAMA', 'length', 'max'=>100),
			array('PASSWORD', 'length', 'max'=>50),
			array('HP', 'length', 'max'=>20),
			array('TANGGAL_INPUT', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USER, ID_PT, EMAIL, PASSWORD, ROLE, ID_BIDANG, NAMA, HP, STATUS, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe', 'on'=>'search'),
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
			'iDPT' => array(self::BELONGS_TO, 'MasterPt', 'ID_PT'),
			'iDBIDANG' => array(self::BELONGS_TO, 'MasterBidangJuri', 'ID_BIDANG'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USER' => 'Id User',
			'ID_PT' => 'Id Pt',
			'EMAIL' => 'Email',
			'PASSWORD' => 'Password',
			'ROLE' => 'Role',
			'ID_BIDANG' => 'Id Bidang',
			'NAMA' => 'Nama',
			'HP' => 'Hp',
			'STATUS' => 'Status',
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
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('ID_BIDANG',$this->ID_BIDANG);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('STATUS',$this->STATUS);
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
	 * @return UserJuri the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
