<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class JuriIdentity extends CUserIdentity
{
    const ERROR_PENDING=3;
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
        $criteria->condition = 'EMAIL=:email AND ROLE=:role';
        $criteria->params = array(':email'=>$this->username,':role'=>WebUser::ROLE_JURI);
        $record=UserJuri::model()->find($criteria);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($record->STATUS==UserJuri::PENDING)
			$this->errorCode=self::ERROR_PENDING;
        else
        {
			$this->setState('isLogin', true);
			$this->setState('role', $record->ROLE);
			$this->setState('isjuri',true);
            $this->setState('nama',$record->NAMA);
            $this->setState('email',$record->EMAIL);
            $this->setState('id_user',$record->ID_USER);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
