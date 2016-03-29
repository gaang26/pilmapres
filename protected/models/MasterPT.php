<?php

/**
 * This is the model class for table "master_pt".
 *
 * The followings are the available columns in table 'master_pt':
 * @property integer $ID_PT
 * @property string $KODE_PT
 * @property string $NAMA
 * @property integer $IS_NEGERI
 * @property integer $KOPERTIS
 * @property string $STATUS
 *
 * The followings are the available model relations:
 * @property MasterKopertis $kOPERTIS
 * @property Peserta[] $pesertas
 * @property UserJuri[] $userJuris
 * @property UserPt[] $userPts
 */
class MasterPT extends CActiveRecord
{
	const SWASTA=0;
    const NEGERI=1;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_pt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KODE_PT', 'required'),
			array('IS_NEGERI, KOPERTIS', 'numerical', 'integerOnly'=>true),
			array('KODE_PT', 'length', 'max'=>6),
			array('NAMA', 'length', 'max'=>255),
			array('STATUS', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PT, KODE_PT, NAMA, IS_NEGERI, KOPERTIS, STATUS', 'safe', 'on'=>'search'),
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
			'kOPERTIS' => array(self::BELONGS_TO, 'MasterKopertis', 'KOPERTIS'),
			'pesertas' => array(self::HAS_MANY, 'Peserta', 'ID_PT'),
			'userJuris' => array(self::HAS_MANY, 'UserJuri', 'ID_PT'),
			'userPts' => array(self::HAS_MANY, 'UserPt', 'ID_PT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PT' => 'Id Pt',
			'KODE_PT' => 'Kode Pt',
			'NAMA' => 'Nama',
			'IS_NEGERI' => 'Is Negeri',
			'KOPERTIS' => 'Kopertis',
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

		$criteria->compare('ID_PT',$this->ID_PT);
		$criteria->compare('KODE_PT',$this->KODE_PT,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('IS_NEGERI',$this->IS_NEGERI);
		$criteria->compare('KOPERTIS',$this->KOPERTIS);
		$criteria->compare('STATUS',$this->STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterPT the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function optionsAll(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'LENGTH(KODE_PT) > 5';
		return CHtml::listData(self::model()->findAll($criteria),'ID_PT','NAMA');
	}
}
