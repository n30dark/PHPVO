<?php

namespace PVO\Validators;

use PVO\Exceptions;

class Url implements Interfaces\Validator {
    
    public function validate($value){
        if(false === filter_var($value, FILTER_VALIDATE_URL)){
            throw new Exceptions\InvalidValueException;
        }
        return true;
    }

}