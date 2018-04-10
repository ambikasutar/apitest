<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		     $user = User::model()->findByAttributes(array('username'=>$this->username));

                if ($user===null) {
                        $this->errorCode=self::ERROR_USERNAME_INVALID;
                } else if ($user->password !== md5($this->password) ) { 
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                } else { // Okay!
                    $this->errorCode=self::ERROR_NONE;
					Yii::app()->user->setState('username', $user->username);
					Yii::app()->user->setState('user_role', $user->user_role);
					Yii::app()->user->setState('id', $user->id);
                    
                }
                return !$this->errorCode;
	}
/*
	protected function afterLogin()
	{
		Yii::app()->user->setState('username', $user->username);
		Yii::app()->user->setState('user_role', $user->user_role);
	}*/
}