<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class JuriLoginForm extends CFormModel
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
			'rememberMe'=>'Tetap masuk',
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
			$this->_identity=new JuriIdentity($this->email,$this->password);
			if(!$this->_identity->authenticate()){
				switch ($this->_identity->errorCode){
					case JuriIdentity::ERROR_PENDING:
						$this->addError('email','Kesalahan Username atau Password');
						return FALSE;
					case JuriIdentity::ERROR_PASSWORD_INVALID:
						$this->addError('password', 'Kesalahan Username atau Password');
						return FALSE;
					case JuriIdentity::ERROR_USERNAME_INVALID:
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
			$this->_identity=new JuriIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===JuriIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
