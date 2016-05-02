<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class KopertisLoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email and password are required
			array('email, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new KopertisIdentity($this->email,$this->password);
			if(!$this->_identity->authenticate()){
				switch ($this->_identity->errorCode){
					// case KopertisIdentity::ERROR_PENDING:
					// 	$this->addError('email','Akun Anda belum diverifikasi. Proses verifikasi dilakukan maksimal 1x24 jam hari kerja.');
					// 	return FALSE;
					case KopertisIdentity::ERROR_PASSWORD_INVALID:
						$this->addError('password', 'Kesalahan Username atau Password');
						return FALSE;
					case KopertisIdentity::ERROR_USERNAME_INVALID:
						$this->addError('password', 'Kesalahan Username atau Password');
                        return FALSE;
				}
			}
				//$this->addError('password','Incorrect email or password.');
		}
	}

	/**
	 * Logs in the user using the given email and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new KopertisIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===KopertisIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
