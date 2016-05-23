<?php

/**
 * This is the model class for table "jadwal".
 *
 * The followings are the available columns in table 'jadwal':
 * @property integer $ID_JADWAL
 * @property string $KETERANGAN
 * @property string $TANGGAL_MULAI
 * @property string $TANGGAL_SELESAI
 * @property string $JAM_MULAI
 * @property string $JAM_SELESAI
 * @property string $TANGGAL_INPUT
 * @property string $TANGGAL_UPDATE
 * @property integer $STATUS
 */
class Jadwal extends CActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    const DAFTAR_PESERTA = 1;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'jadwal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('KETERANGAN, TANGGAL_MULAI', 'required'),
            array('STATUS', 'numerical', 'integerOnly'=>true),
            array('KETERANGAN', 'length', 'max'=>255),
            array('TANGGAL_INPUT, TANGGAL_UPDATE', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_JADWAL, KETERANGAN, TANGGAL_MULAI, TANGGAL_SELESAI, JAM_MULAI, JAM_SELESAI, TANGGAL_INPUT, TANGGAL_UPDATE, STATUS', 'safe', 'on'=>'search'),
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
            'ID_JADWAL' => 'Id Jadwal',
            'KETERANGAN' => 'Keterangan',
            'TANGGAL_MULAI' => 'Tanggal Mulai',
            'TANGGAL_SELESAI' => 'Tanggal Selesai',
            'JAM_MULAI' => 'Jam Mulai',
            'JAM_SELESAI' => 'Jam Selesai',
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

        $criteria->compare('ID_JADWAL',$this->ID_JADWAL);
        $criteria->compare('KETERANGAN',$this->KETERANGAN,true);
        $criteria->compare('TANGGAL_MULAI',$this->TANGGAL_MULAI,true);
        $criteria->compare('TANGGAL_SELESAI',$this->TANGGAL_SELESAI,true);
        $criteria->compare('JAM_MULAI',$this->JAM_MULAI,true);
        $criteria->compare('JAM_SELESAI',$this->JAM_SELESAI,true);
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
     * @return Jadwal the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getLabelStatus(){
        if($this->STATUS==self::ACTIVE){
            return '<span class="label label-success">AKTIF</span>';
        }else{
            return '<span class="label label-warning">TIDAK AKTIF</span>';
        }
    }

    public function getActionButton(){
        if($this->STATUS==self::ACTIVE){
            $button = CHtml::link('<i class="fa fa-close"></i> TUTUP',array('jadwal/tutup','id'=>$this->ID_JADWAL),array(
                'class'=>'btn btn-sm red'
            ));
        }else{
            $button = CHtml::link('<i class="fa fa-check"></i> BUKA',array('jadwal/buka','id'=>$this->ID_JADWAL),array(
                'class'=>'btn btn-sm green'
            ));
        }


        return $button;
    }

    public static function isDaftarPesertaOpen(){
        $model = self::model()->findByPk(self::DAFTAR_PESERTA);
        return $model->STATUS==self::ACTIVE;
    }
}
