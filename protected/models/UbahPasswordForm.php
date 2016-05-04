<?php
class UbahPasswordForm extends CFormModel
{
	public $OLD;
	public $NEW;
	public $REPEAT;

	public function rules()
	{
		return array(
			array(
				'OLD, NEW, REPEAT',
				'required',
				'message'=>'{attribute} harus diisi',
			),
			array('NEW, REPEAT', 'length', 'min'=>6, 'max'=>40,'message'=>'Password minimal 6 karakter'),
            array('REPEAT', 'compare', 'compareAttribute'=>'NEW','message'=>'Password tidak cocok'),
        );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'OLD'=>'Password Lama',
			'NEW'=>'Password Baru',
			'REPEAT'=>'Confirm Password Baru'
		);
	}

	public function cekOldPasswordPT($password)
	{
		$model=UserPT::model()->findByPk(Yii::app()->user->getState('id_user'));
		if(md5($password)!=$model->PASSWORD)
			return false;
		else
			return true;
	}

	public function savePasswordPT($password)
	{
		$model=UserPT::model()->findByPk(Yii::app()->user->getState('id_user'));
		$model->setAttribute('PASSWORD',md5($password));
		if($model->save())
			return true;
		else
			return false;
	}

    public function cekOldPasswordKopertis($password)
	{
		$model=UserKopertis::model()->findByPk(Yii::app()->user->getState('id_user'));
		if(md5($password)!=$model->PASSWORD)
			return false;
		else
			return true;
	}

	public function savePasswordKopertis($password)
	{
		$model=UserKopertis::model()->findByPk(Yii::app()->user->getState('id_user'));
		$model->setAttribute('PASSWORD',md5($password));
		if($model->save())
			return true;
		else
			return false;
	}

    public function cekOldPasswordPeserta($password)
	{
		$model=User::model()->findByPk(Yii::app()->user->id);
		if(md5($password)!=$model->PASSWORD)
			return false;
		else
			return true;
	}

	public function savePasswordPeserta($password)
	{
		$model=User::model()->findByPk(Yii::app()->user->id);
		$model->setAttribute('PASSWORD',md5($password));
		if($model->save())
			return true;
		else
			return false;
	}

	public function cekOldPasswordJuri(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'USERNAME=:username';
		$criteria->params = array(':username'=>Yii::app()->user->id);
		$model = Juri::model()->find($criteria);

		if($this->OLD!=$model->PASSWORD){
			return false;
		}else{
			return true;
		}
	}

	public function savePasswordJuri()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'USERNAME=:username';
		$criteria->params = array(':username'=>Yii::app()->user->id);
		$model = Juri::model()->find($criteria);

		$model->setAttribute('PASSWORD',$this->NEW);
		if($model->save())
			return true;
		else
			return false;
	}
}
?>
