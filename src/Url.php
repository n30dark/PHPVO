<?php

namespace PVO;

use Validators\Interfaces\Validator;

class Url implements Interfaces\Pvo {
    
    private $value;
    
    public function __construct($value, Validators\Interfaces\Validator $validator=null){
        if(is_null($validator)){
            $validator = new Validators\Url;
        }

        try {
            $validator->validate($value);
        }
        catch(Exceptions\InvalidValueException $e){
            throw new Exceptions\InvalidValueException("Value is not a valid url", 999, $e);
        }
        $this->value = $value;
    }
    
    public function value(){
        return $this->value;
    }
    
    public function __toString(){
        return $this->value();
    }

}