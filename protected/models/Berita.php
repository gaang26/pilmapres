<?php

/**
 * This is the model class for table "berita".
 *
 * The followings are the available columns in table 'berita':
 * @property integer $ID_BERITA
 * @property string $JUDUL
 * @property string $BERITA
 * @property integer $STATUS
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 */
class Berita extends CActiveRecord
{
    const PUBLISHED = 1;
    const DRAFT = 0;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'berita';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('JUDUL, BERITA', 'required'),
            array('STATUS', 'numerical', 'integerOnly'=>true),
            array('JUDUL', 'length', 'max'=>500),
            array('TANGGAL_INPUT, TANGGAL_UPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_BERITA, JUDUL, BERITA, STATUS, TANGGAL_INPUT, TANGGAL_UPDATE', 'safe', 'on'=>'search'),
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
            'ID_BERITA' => 'Id Berita',
            'JUDUL' => 'Judul',
            'BERITA' => 'Berita',
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

        $criteria->compare('ID_BERITA',$this->ID_BERITA);
        $criteria->compare('JUDUL',$this->JUDUL,true);
        $criteria->compare('BERITA',$this->BERITA,true);
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
     * @return Berita the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function optionsStatus(){
        return array(
            self::PUBLISHED=>'Published',
            self::DRAFT=>'Draft'
        );
    }

    public function getLabelStatus(){
        if($this->STATUS==self::PUBLISHED){
            return 'Published';
        }else{
            return 'Draft';
        }
    }
}
