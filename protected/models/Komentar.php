<?php

/**
 * This is the model class for table "komentar".
 *
 * The followings are the available columns in table 'komentar':
 * @property integer $ID_KOMENTAR
 * @property integer $ID_PESERTA
 * @property integer $ID_JURI
 * @property integer $BIDANG
 * @property string $KOMENTAR
 * @property string $TANGGAL_INPUT
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Peserta $iDPESERTA
 * @property UserJuri $iDJURI
 */
class Komentar extends CActiveRecord
{
    const KTI=1;
    const PRESTASI=2;
    const VIDEO=3;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'komentar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ID_PESERTA, ID_JURI, BIDANG, KOMENTAR', 'required'),
            array('ID_PESERTA, ID_JURI, BIDANG, STATUS', 'numerical', 'integerOnly'=>true),
            array('TANGGAL_INPUT', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_KOMENTAR, ID_PESERTA, ID_JURI, BIDANG, KOMENTAR, TANGGAL_INPUT, STATUS', 'safe', 'on'=>'search'),
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
            'Juri' => array(self::BELONGS_TO, 'UserJuri', 'ID_JURI'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID_KOMENTAR' => 'Id Komentar',
            'ID_PESERTA' => 'Id Peserta',
            'ID_JURI' => 'Id Juri',
            'BIDANG' => 'Bidang',
            'KOMENTAR' => 'Komentar',
            'TANGGAL_INPUT' => 'Tanggal Input',
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

        $criteria->compare('ID_KOMENTAR',$this->ID_KOMENTAR);
        $criteria->compare('ID_PESERTA',$this->ID_PESERTA);
        $criteria->compare('ID_JURI',$this->ID_JURI);
        $criteria->compare('BIDANG',$this->BIDANG);
        $criteria->compare('KOMENTAR',$this->KOMENTAR,true);
        $criteria->compare('TANGGAL_INPUT',$this->TANGGAL_INPUT,true);
        $criteria->compare('STATUS',$this->STATUS);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Komentar the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getTanggalInputFormatted(){
        return date('j F Y',strtotime($this->TANGGAL_INPUT));
    }
}
