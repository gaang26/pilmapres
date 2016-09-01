
<?php

/**
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property integer $ID_FILE
 * @property string $NAMA_FILE
 * @property string $TIPE_FILE
 * @property string $KETERANGAN
 * @property string $FILE_PATH
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 * @property integer $STATUS
 */
class Files extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'files';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NAMA_FILE, FILE_PATH', 'required'),
            array('STATUS', 'numerical', 'integerOnly'=>true),
            array('NAMA_FILE, FILE_PATH', 'length', 'max'=>500),
            array('TIPE_FILE', 'length', 'max'=>10),
            array('KETERANGAN, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_FILE, NAMA_FILE, TIPE_FILE, KETERANGAN, FILE_PATH, TANGGAL_INPUT, TANGGAL_UPDATE, STATUS', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID_FILE' => 'Id File',
            'NAMA_FILE' => 'Nama File',
            'TIPE_FILE' => 'Tipe File',
            'KETERANGAN' => 'Keterangan',
            'FILE_PATH' => 'File Path',
            'TANGGAL_INPUT' => 'Tanggal Input',
            'TANGGAL_UPDATE' => 'Tanggal Update',
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

        $criteria->compare('ID_FILE',$this->ID_FILE);
        $criteria->compare('NAMA_FILE',$this->NAMA_FILE,true);
        $criteria->compare('TIPE_FILE',$this->TIPE_FILE,true);
        $criteria->compare('KETERANGAN',$this->KETERANGAN,true);
        $criteria->compare('FILE_PATH',$this->FILE_PATH,true);
        $criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
        $criteria->compare('TANGGAL_UPDATE',$this->TANGGAL_UPDATE,true);
        $criteria->compare('STATUS',$this->STATUS);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Files the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
