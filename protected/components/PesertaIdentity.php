<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class PesertaIdentity extends CUserIdentity
{
    const ERROR_INACTIVE=3;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $criteria = new CDbCriteria;
        $criteria->condition = 'PIN=:pin AND TAHUN=:tahun';
        $criteria->params = array(':pin'=>$this->username,':tahun'=>Yii::app()->params['tahun']);
        $record=Peserta::model()->find($criteria);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else if($record->STATUS==User::INACTIVE)
		// 	$this->errorCode=self::ERROR_INACTIVE;
        else
        {
			$this->setState('isLogin', true);
			$this->setState('role', $record->ROLE);
			$this->setState('is_peserta',true);
            $this->setState('nama',$record->NAMA);
            $this->setState('pin',$record->PIN);
            $this->setState('email',$record->EMAIL);
            $this->setState('id_peserta',$record->ID_PESERTA);

            $this->setState('id_pt',$record->ID_PT);
            $this->setState('nama_pt',$record->PT->NAMA);
            $this->setState('kode_pt',$record->PT->KODE_PT);
            $this->setState('isnegeri',$record->PT->IS_NEGERI);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
