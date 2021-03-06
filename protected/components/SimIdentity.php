<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class SimIdentity extends CUserIdentity
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
        $criteria->condition = 'EMAIL=:email AND ROLE=:role';
        $criteria->params = array(':email'=>$this->username,':role'=>WebUser::ROLE_ADMIN);
        $record=User::model()->find($criteria);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($record->STATUS==User::PENDING)
			$this->errorCode=self::ERROR_INACTIVE;
        else
        {
			$this->setState('isLogin', true);
			$this->setState('role', $record->ROLE);
			$this->setState('isadmin',true);
            $this->setState('nama',$record->NAMA);
            $this->setState('email',$record->EMAIL);
            $this->setState('id_user',$record->ID_USER);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
