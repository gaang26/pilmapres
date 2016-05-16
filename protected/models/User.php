<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID_USER
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property integer $ROLE
 * @property string $NAMA
 * @property string $HP
 * @property string $TELP
 * @property integer $STATUS
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 *
 * The followings are the available model relations:
 * @property UserPt[] $userPts
 */
class User extends CActiveRecord
{
	const ACTIVE = 1;
	const PENDING = 0;
	const REJECTED = -1;

	public $PASSWORD_REPEAT;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA, EMAIL, PASSWORD, PASSWORD_REPEAT, ROLE, TANGGAL_INPUT', 'required','on'=>'create'),
			array('ROLE, STATUS', 'numerical', 'integerOnly'=>true),
			array('EMAIL, NAMA', 'length', 'max'=>100),
			array('PASSWORD', 'length', 'max'=>50),
			array('HP, TELP', 'length', 'max'=>20),
			array('TANGGAL_INPUT', 'safe'),
			array('PASSWORD_REPEAT', 'compare', 'compareAttribute'=>'PASSWORD','on'=>'create','message'=>'Password tidak cocok'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USER, EMAIL, PASSWORD, ROLE, NAMA, HP, TELP, STATUS, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe', 'on'=>'search'),
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
			'userPts' => array(self::HAS_MANY, 'UserPt', 'VERIFIKATOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USER' => 'Id User',
			'EMAIL' => 'Email',
			'PASSWORD' => 'Password',
			'PASSWORD_REPEAT' => 'Confirm  Password',
			'ROLE' => 'Role',
			'NAMA' => 'Nama',
			'HP' => 'HP',
			'TELP' => 'Telp',
			'STATUS' => 'Status',
			'TANGGAL_INPUT' => 'Tanggal Entri',
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
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('TELP',$this->TELP,true);
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
	 * @return User the static model class
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
		$update =  CHtml::link('<i class="fa fa-pencil"></i> Koreksi',array('user/update','type'=>WebUser::ROLE_ADMIN,'id'=>$this->ID_USER),array(
			'class'=>'btn btn-sm btn-success',
		));

		$button = $update;

		return $button;
	}

	public function getDeleteButton(){
		$delete =  CHtml::link('<i class="fa fa-trash"></i> Hapus','#',array(
			'class'=>'btn btn-sm red',
			'submit'=>array('user/delete','type'=>WebUser::ROLE_ADMIN,'id'=>$this->ID_USER),
			'confirm'=>'Anda akan menghapus user ini. Apakah Anda ingin melanjutkan?'
		));

		$button = $delete;

		return $button;
	}
}
