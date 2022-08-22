<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MaxWordsRule implements Rule
{
    private $max_words;

    public function __construct($max_words = 500)
    {
        $this->max_words = $max_words;
    }


    public function passes($attribute, $value)
    {
        return Str::words($value, $this->max_words) <= $this->max_words;
    }

    public function message()
    {
        return 'The :attribute field cannot be longer than '.$this->max_words.' words.';
    }
}
