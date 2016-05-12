<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class PTIdentity extends CUserIdentity
{
    const ERROR_PENDING=3;
    const ERROR_REJECTED=4;
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
        $criteria->condition = 'EMAIL=:email AND ROLE=:role AND STATUS!=:rejected';
        $criteria->params = array(':email'=>$this->username,':role'=>WebUser::ROLE_PT,':rejected'=>UserPT::REJECTED);
        $record=UserPT::model()->find($criteria);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!=md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($record->STATUS==UserPT::PENDING)
			$this->errorCode=self::ERROR_PENDING;
        else if($record->STATUS==UserPT::REJECTED)
			$this->errorCode=self::ERROR_REJECTED;
        else
        {
			$this->setState('isLogin', true);
			$this->setState('role', $record->ROLE);
			$this->setState('is_pt',true);
            $this->setState('nama',$record->NAMA);
            $this->setState('email',$record->EMAIL);
            $this->setState('id_user',$record->ID_USER);

            $this->setState('id_pt',$record->ID_PT);
            $this->setState('nama_pt',$record->PT->NAMA);
            $this->setState('kode_pt',$record->PT->KODE_PT);
            $this->setState('isnegeri',$record->PT->IS_NEGERI);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
