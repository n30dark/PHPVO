<?php

namespace PVO\Interfaces;

use PVO\Validators;

interface Pvo {
    public function __construct($value, Validators\Interfaces\Validator $validator=null);
    public function value();
    public function __toString();
}
