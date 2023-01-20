<?php

/**
 * Class RegisterModel
 * @author zidea <github zideajang>
 * @package app\models
 */

namespace app\models;
use app\core\Model;

 class RegisterModel extends Model{
    public string $username = '';
    public string $useremail = '';
    public string $password = '';

    public string $confirmPassword = '';

    public function register()
    {
        echo "Creating new user";
    }
 	/**
	 * @return mixed
	 */
	public function rules() {
        return [
            'username' => [self::RULE_REQUIRED],
            'useremail' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min'=>3],[self::RULE_MAX,'max'=>12]],
            'confirmPassword' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']]
        ];
	}
}