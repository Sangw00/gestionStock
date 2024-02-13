<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Pass implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character
        return preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_+=])[A-Za-z0-9!@#$%^&*()\-_+=]{8,}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.';
    }
}
