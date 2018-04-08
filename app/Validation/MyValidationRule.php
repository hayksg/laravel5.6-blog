<?php

namespace App\Validation;

use Illuminate\Contracts\Validation\Rule;

class MyValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        return $value > 10;       
    }

    public function message()
    {
        return ':attribute needs more cowbell!';
    }
}
