<?php

namespace app\core\form;

use app\core\Model;

class Field
{

    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASSWORD = 'password';
    public Model $model;
    public string $attribute;
    public string $fieldName;

    public string $type;

    public function __construct($model,$attribute,$fieldName){
        $this->model = $model;
        $this->attribute = $attribute;
        $this->fieldName = $fieldName;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString(){
        return sprintf('
        <div class="field">
            <label class="label">%s</label>
            <div class="control">
                <input  name="%s" value="%s" type="%s" placeholder="请输入%s" class="input%s">
            </div>
        </div>
        <p class="help is-danger">%s</p>
        ',$this->fieldName,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->type,
        $this->fieldName,
        $this->model->hasError($this->attribute) ? ' is-danger':'',
        $this->model->getFirstError($this->attribute)
    );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    
}