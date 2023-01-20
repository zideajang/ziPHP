<?php

namespace app\core;

/**
 * class Model
 * @author zideajang <小马学编程> 公众号
 * @package app\core
 */
abstract class Model{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData($data)
    {
        foreach($data as $key=>$value){
            if(property_exists($this,$key)){
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules();
    
    
    public function validate()
    {
        foreach($this->rules() as $attribute => $rules ){
            // 'username' => [self::RULE_REQUIRED],
            $value = $this->{$attribute};
            foreach($rules as $rule){
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, self::RULE_MIN,$rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute, self::RULE_MAX,$rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $this->addError($attribute, self::RULE_MATCH,$rule);
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule,$params=[]){
        $message = $this->errorMessages()[$rule] ?? '';
        foreach($params as $key=>$value){
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => "这个字段不能为空，是必填字段",
            self::RULE_EMAIL => "这个字段为邮件地址格式",
            self::RULE_MIN => "最小长度为{min}",
            self::RULE_MAX => "最大长度为{max}",
            self::RULE_MATCH => "请输入与 {match} 字段相同的内容"
        ];
    }

    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        $erros = $this->errors[$attribute] ?? [];
        return $erros[0] ?? '';
    }
}

